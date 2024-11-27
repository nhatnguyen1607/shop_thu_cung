<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use App\Models\Khachhang;
use App\Models\Dathang;
use App\Models\ChitietDonhang;
use App\Models\Sanpham;


class OrdersController extends Controller
{
    public function order(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Bạn cần đăng nhập để mua hàng.');
        }
        $sanpham = Sanpham::findOrFail($id);

        $quantity = $request->input('quantity', 1);
        $user = Auth::user();
        $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first();

        if ($sanpham->soluong < $quantity) {
            return redirect()->back()->with('error', 'Sản phẩm đã hết hàng.');
        }

        // Lưu thông tin đơn hàng vào session
        session(['order' => [
            'id' => $sanpham->id_sanpham,
            'anhsp' => $sanpham->anhsp,
            'tensp' => $sanpham->tensp,
            'giasp' => $sanpham->giasp,
            'giamgia' => $sanpham->giamgia,
            'giakhuyenmai' => $sanpham->giakhuyenmai,
            'quantity' => $quantity,
            'khachhang_id' => $khachhang->id_kh,
        ]]);
        return view('user.checkout');
        // return redirect()->route('checkout');
    }


    public function checkout(Request $request)
    {
        $order = session('order');
        $user = Auth::user();
        $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first();
        $totalAmount = ($order['giakhuyenmai'] ?: $order['giasp']) * $order['quantity'];
        $validatedData = $request->validate([
            'redirect' => 'required|string',
            'diachigiaohang' => 'required|string',
        ]);
        $dathang = Dathang::create([
            'id_kh' => $khachhang->id_kh,
            'ngaydathang' => Carbon::now(),
            'tongtien' => $totalAmount,
            'trangthai' => 'đang xử lý',
            'ngaydathang' => Carbon::now(),
            'ngaygiaohang' => null,
            'trangthai' => "đang xử lý",
            'phuongthucthanhtoan' => $validatedData['redirect'],
            'diachigiaohang' => $validatedData['diachigiaohang'],
        ]);
        ChitietDonhang::create([
            'tensp' => $order['tensp'],
            'soluong' => $order['quantity'],
            'giamgia' => $order['giamgia'],
            'giatien' => $order['giasp'],
            'giakhuyenmai' => $order['giakhuyenmai'],
            'id_sanpham' => $order['id'],
            'id_dathang' => $dathang->id_dathang,
            'id_kh' => $khachhang->id_kh,
        ]);
        $sanpham = Sanpham::find($order['id']);
        $sanpham->soluong -= $order['quantity'];
        $sanpham->save();
        session()->forget('order');
        return view('user.thongbaodathang');
    }
    public function vnpay(Request $request)
    {
        $order = session('order');

        $vnp_TmnCode = "GHHNT2HB"; //Mã website tại VNPAY 
        $vnp_HashSecret = "BAGAOHAPRHKQZASKQZASVPRSAKPXNYXS"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/cart/thongbaodathang";
        $vnp_TxnRef = date("YmdHis");
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dịch vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $order['giakhuyenmai'] ?: $order['giasp'] * $order['quantity'] * 100;
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
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        $this->checkout($request);
        return redirect($vnp_Url);
    }
    public function nhanHang($id)
    {
        $order = Dathang::find($id);
        $order->trangthai = 'giao thành công';
        $order->save();
        return redirect()->back()->with('success', 'Xác nhận đơn hàng thành công');
    }
    public function huyDonHang($id)
    {
        $order = Dathang::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
        }

        $orderDetails = ChitietDonhang::where('id_dathang', $id)->get();

        foreach ($orderDetails as $detail) {
            $sanpham = Sanpham::find($detail->id_sanpham);

            if ($sanpham) {
                $sanpham->soluong += $detail->soluong;
                $sanpham->save();
            }
        }

        $order->trangthai = 'đã hủy';
        $order->save();

        return redirect()->back()->with('success', 'Hủy đơn hàng thành công.');
    }
}
