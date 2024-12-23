<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\IOrderRepository;

class OrderController extends Controller
{
    private $OrderRepository;

    public function __construct(IOrderRepository $OrderRepository) {
        $this->OrderRepository = $OrderRepository;
    }

    public function index(Request $request) {
        $filterStatus= $request->input('trangthai');
        $orders = $this->OrderRepository->allOrder($filterStatus);
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function edit($id) {
        $order = $this->OrderRepository->findOrder($id);
        $orderdetails = $this->OrderRepository->findDetailProduct($id);
        $showuser = $this->OrderRepository->findUser($id); 

        return view('admin.orders.edit', [
            'order' => $order,
            'orderdetails' => $orderdetails,
            'showuser' => $showuser 
        ]);
    }

    public function update($id, Request $request) {
        $validatedData = $request->validate([
            'ngaygiaohang' => 'required',
            'trangthai' => 'required',
        ]);
        
        $this->OrderRepository->updateOrder($validatedData, $id);

        return redirect()->route('orders.index')->with('success', 'Cập nhập đơn hàng thành công');
    }
}
