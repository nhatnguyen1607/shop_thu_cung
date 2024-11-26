<?php

namespace App\Http\Controllers;

use App\Models\Khachhang;
use App\Models\Dathang;
use App\Repositories\IOrderRepository;
use Illuminate\Support\Facades\Auth;

class OrderViewController extends Controller
{
    private $orderRepository;

    public function __construct(IOrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    // public function index()
    // {
    //     $orders = DatHang::with('chiTietDonHang')->get();
    //     return view('donhang.index', compact('orders'));
    // }
    public function donhang()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->with('error', 'Bạn cần đăng nhập để xem đơn hàng.');
        }
        $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first();

        // Lấy danh sách đơn hàng của người dùng
        $orders = $this->orderRepository->orderView($khachhang->id_kh);
        return view('user.order', ['orders' => $orders]);
    }

    public function xemDonHang($id)
    {
        $order = $this->orderRepository->findOrder($id);

        if (!$order) {
            return redirect()->route('donhang')->with('error', 'Đơn hàng không tồn tại.');
        }
        $user = Auth::user();
        $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first();
        $taikhoan = $user;
        $orderdetails = $this->orderRepository->findDetailProduct($id);
        $showuser = $this->orderRepository->findUser($order->id_kh); 

        return view('user.orderdetail', [
            'order' => $order,
            'orderdetails' => $orderdetails,
            'email' => $taikhoan->email,
            'khachhang' => $khachhang ,
            'taikhoan' => $taikhoan 
        ]);
    }
}
