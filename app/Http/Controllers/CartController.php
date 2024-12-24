<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use App\Models\Khachhang;
use App\Models\Sanpham;
use App\Models\Dathang;
use App\Models\ChitietDonhang;

class CartController extends Controller
{
    public function index()
    {

        $products = Sanpham::all();
        return view('products', compact('products'));
    }

    public function cart()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
        }

        $user = Auth::user();
        $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first();

        if (!$khachhang) {
            return redirect()->back()->with('error', 'Không tìm thấy thông tin khách hàng.');
        }

        $cartItems = DB::table('giohang')
            ->join('sanpham', 'giohang.sanpham_id', '=', 'sanpham.id_sanpham')
            ->leftJoin('anh_sp', function ($join) {
                $join->on('sanpham.id_sanpham', '=', 'anh_sp.id_sanpham')
                    ->where('anh_sp.id_anh', '=', DB::raw("(SELECT MIN(id_anh) FROM anh_sp WHERE anh_sp.id_sanpham = sanpham.id_sanpham)"));
            })
            ->where('giohang.khachhang_id', $khachhang->id_kh)
            ->select(
                'giohang.*',
                'sanpham.tensp',
                'sanpham.giasp',
                'sanpham.giamgia',
                'sanpham.giakhuyenmai',
                'anh_sp.anh_sp as anhsp'
            )
            ->get();
        Log::info($cartItems);

        return view('user.cart', ['cartItems' => $cartItems]);
    }


    public function addToCart($id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }
        $product = Sanpham::findOrFail($id);
        if ($product->soluong < 1) {
            return redirect()->back()->with('error', 'Sản phẩm đã hết hàng.');
        }
        $user = Auth::user();
        $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first();
        if (Auth::check()) {
            $cartItem = DB::table('giohang')
                ->where('khachhang_id', $khachhang->id_kh)
                ->where('sanpham_id', $id)
                ->first();

            if ($cartItem) {
                DB::table('giohang')
                    ->where('khachhang_id', $khachhang->id_kh)
                    ->where('sanpham_id', $id)
                    ->update([
                        'quantity' => $cartItem->quantity + 1,
                        'updated_at' => now(),
                    ]);
            } else {
                DB::table('giohang')->insert([
                    'khachhang_id' => $khachhang->id_kh,
                    'sanpham_id' => $id,
                    'quantity' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Thêm vào giỏ hàng thành công!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);
        $user = Auth::user();
        $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first();
        if (Auth::check()) {
            $updated = DB::table('giohang')
                ->where('id', $request->id)
                ->where('khachhang_id', $khachhang->id_kh)
                ->update([
                    'quantity' => $request->quantity,
                    'updated_at' => now(),
                ]);
        }
    }

    public function remove(Request $request)
    {
        $user = Auth::user();
        $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first();
        if (Auth::check() && $request->id) {
            $deleted = DB::table('giohang')
                ->where('khachhang_id', $khachhang->id_kh)
                ->where('id', $request->id)
                ->delete();

            if ($deleted) {
                return response()->json(['success' => 'Xóa sản phẩm khỏi giỏ hàng thành công!']);
            } else {
                Log::error('Không thể xóa sản phẩm', ['request' => $request->all()]);
            }
        }

        return response()->json(['error' => 'Có lỗi xảy ra khi xóa sản phẩm'], 400);
    }

    public function orderfromcart()
    {
        $user = Auth::user();
        $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first();
        $khachhang_id = $khachhang->id_kh;

        $cartItems = DB::table('giohang')
            ->join('sanpham', 'giohang.sanpham_id', '=', 'sanpham.id_sanpham')
            ->leftJoin('anh_sp', function ($join) {
                $join->on('sanpham.id_sanpham', '=', 'anh_sp.id_sanpham')
                    ->where('anh_sp.id_anh', '=', DB::raw("(SELECT MIN(id_anh) FROM anh_sp WHERE anh_sp.id_sanpham = sanpham.id_sanpham)"));
            })
            ->where('giohang.khachhang_id', $khachhang->id_kh)
            ->select(
                'giohang.*',
                'sanpham.tensp',
                'sanpham.giasp',
                'sanpham.giamgia',
                'sanpham.giakhuyenmai',
                'anh_sp.anh_sp as anhsp'
            )
            ->get();
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn hiện tại trống. Vui lòng thêm sản phẩm trước khi đặt hàng.');
        }
        foreach ($cartItems as $item) {
            $sanpham = Sanpham::find($item->sanpham_id);
            if ($sanpham->soluong < $item->quantity) {
                return redirect()->back()->with('error', 'Sản phẩm ' . $sanpham->tensp . ' không đủ số lượng!');
            }
        }
        $showusers = DB::table('khachhang')->where('id_kh', $khachhang_id)->get();

        return view('user.checkoutfromcart', compact('cartItems', 'showusers'));
    }

    public function checkoutfromcart(Request $request)
    {
        $validatedData = $request->validate([
            'tongtien' => 'required|numeric',
            'redirect' => 'required|string',
            'diachigiaohang' => 'required|string',
        ]);
        $user = Auth::user();
        $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first();
        $khachhang_id = $khachhang->id_kh;

        $cartItems = DB::table('giohang')
            ->where('khachhang_id', $khachhang_id)
            ->get();

        foreach ($cartItems as $item) {
            $sanpham = Sanpham::find($item->sanpham_id);
            $order = Dathang::create([
                'id_kh' => $khachhang_id,
                'ngaydathang' => Carbon::now(),
                'ngaygiaohang' => null,
                'trangthai' => "đang xử lý",
                'tongtien' => $validatedData['tongtien'],
                'phuongthucthanhtoan' => $validatedData['redirect'],
                'diachigiaohang' => $validatedData['diachigiaohang'],
            ]);
            ChitietDonhang::create([
                'tensp' => $sanpham->tensp,
                'soluong' => $item->quantity,
                'giamgia' => $sanpham->giamgia,
                'giatien' => $sanpham->giasp,
                'giakhuyenmai' => $sanpham->giakhuyenmai,
                'id_sanpham' => $sanpham->id_sanpham,
                'id_dathang' => $order->id_dathang,
                'id_kh' => $khachhang_id,
            ]);

            $sanpham->soluong -= $item->quantity;
            $sanpham->save();
        }
        DB::table('giohang')->where('khachhang_id', $khachhang_id)->delete();
        return view('user.thongbaodathang');
    }

    public function thongbaodathang(Request $request)
    {
        if ($request->has('vnp_ResponseCode') && $request->has('vnp_TransactionNo')) {
            $responseCode = $request->input('vnp_ResponseCode');

            if ($responseCode == '00') {
                return view('user.thongbaodathang');
            } else {
                return redirect('/cart');
            }
        }

        return redirect('/cart');
    }


    public function vnpayfromcart(Request $request)
    {
        $vnp_TmnCode = "GHHNT2HB"; //Mã website tại VNPAY 
        $vnp_HashSecret = "BAGAOHAPRHKQZASKQZASVPRSAKPXNYXS"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/cart/thongbaodathang";
        $vnp_TxnRef = date("YmdHis");
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->tongtien * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }

        $this->checkoutfromcart($request);
        return redirect($vnp_Url);
    }
}
