<style>
    /* CSS toàn trang */
.container {
    padding-left: 15px;
    padding-right: 15px;
    margin-top: 3vw;
    margin-bottom: 2vw;
}

/* Điều chỉnh độ rộng cho các bảng */
.table th, .table td {
    padding: 12px;
}

/* Màn hình nhỏ hơn 768px */
@media (max-width: 768px) {
    .container {
        overflow-x: auto;
    }

    /* .d-flex {
        flex-direction: column;
        align-items: flex-start;
    }

    .mr-4 {
        margin-right: 0;
    }

    .mb-3 {
        margin-bottom: 1.5rem;
    }

    .table th, .table td {
        padding: 8px;
    }

    .table th {
        font-size: 14px;
    }

    .table td {
        font-size: 12px;
    }

    .table .badge {
        font-size: 12px;
        padding: 5px 10px;
    }

    .h3 {
        font-size: 18px;
        text-align: center;
    }

    .text-danger {
        font-size: 30px;
    }

    .btn {
        font-size: 14px;
        padding: 8px 16px;
    } */
}

/* Màn hình từ 768px đến 1200px (tablet đến laptop) */
@media (min-width: 768px) and (max-width: 1200px) {
    .table th, .table td {
        padding: 10px;
    }

    .table th {
        font-size: 16px;
    }

    .table td {
        font-size: 14px;
    }

    .text-danger {
        font-size: 35px;
    }

    /* Cân chỉnh các phần tử trong thông tin khách hàng */
    .d-flex {
        flex-direction: row;
        justify-content: space-between;
    }

    .mr-4 {
        margin-right: 30px;
    }

    .mb-3 {
        margin-bottom: 1rem;
    }
}

</style>
@extends('layout')
@section('content')
<div class="container">
    <h1 class="h3 mb-3 bg-light p-3"><strong>Đơn hàng đã đặt</strong></h1>

    <div class="err">
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div class=" bg-light p-3 my-3">
        <h4>Thông tin khách hàng</h4>
        <div class="d-flex flex-wrap">
            <div class="mr-4 mb-3 mb-md-0">
                <div style="font-size: 18px;"><strong>Khách hàng:</strong> {{$khachhang->hoten}}</div>
                <div style="font-size: 18px;"><strong>Email:</strong> {{$taikhoan->email}}</div>
            </div>
            <div>
                <div style="font-size: 18px;"><strong>Số điện thoại:</strong> {{$khachhang->sdt}}</div>
                <div style="font-size: 18px;"><strong>Địa chỉ:</strong> {{$khachhang->diachi}}</div>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <table class="table table-hover my-0">
            <tbody>
                <tr>
                    <th>ID đơn hàng</th>
                    <td>{{$order->id_dathang}}</td>
                </tr>
                <tr>
                    <th>Ngày đặt</th>
                    <td>{{$order->ngaydathang}}</td>
                </tr>
                <tr>
                    <th>Ngày giao</th>
                    <td>
                        @if($order->ngaygiaohang)
                        {{ date('Y-m-d', strtotime($order->ngaygiaohang)) }}
                        @else
                        {{ date('Y-m-d') }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Phương thức thanh toán</th>
                    @if ($order->phuongthucthanhtoan == "COD")
                    <td class="d-none d-xl-table-cell">
                        <div class="badge bg-secondary text-white">{{$order->phuongthucthanhtoan}}</div>
                    </td>
                    @elseif ($order->phuongthucthanhtoan == "VNPAY")
                    <td class="d-none d-xl-table-cell">
                        <div class="badge bg-primary text-white">{{$order->phuongthucthanhtoan}}</div>
                    </td>
                    @else
                    <td class="d-none d-xl-table-cell">{{$order->phuongthucthanhtoan}}</td>
                    @endif
                </tr>
                <tr>
                    <th>Địa chỉ giao hàng</th>
                    <td>{{$order->diachigiaohang}}</td>
                </tr>
                <tr>
                    <th>Trạng thái</th>
                    <td>
                        @if($order->trangthai == 'đang xử lý')
                        <span class="badge bg-primary text-white">{{$order->trangthai}}</span>
                        @elseif ($order->trangthai == 'chờ lấy hàng')
                        <span class="badge bg-warning text-white">{{$order->trangthai}}</span>
                        @elseif ($order->trangthai == 'đang giao hàng')
                        <span class="badge bg-info text-white">{{$order->trangthai}}</span>
                        @elseif ($order->trangthai == 'giao thành công')
                        <span class="badge bg-success text-white">{{$order->trangthai}}</span>
                        @else
                        <span class="badge bg-danger text-white">{{$order->trangthai}}</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mb-3">
        <table class="table table-hover my-0">
            <thead>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá gốc</th>
                <th>Giảm giá</th>
                <th>Giá khuyến mại</th>
                <th>Tổng tiền</th>
            </thead>
            <tbody>
                @php
                $totalPrice = 0; 
                @endphp
                @foreach ($orderdetails as $orderdetail)
                <tr>
                    <td>{{$orderdetail->tensp}}</td>
                    <td>{{$orderdetail->soluong}}</td>
                    <td>{{$orderdetail->giatien}}</td>
                    <td>{{$orderdetail->giamgia}}%</td>
                    <td>{{$orderdetail->giakhuyenmai}}</td>
                    <td>{{$orderdetail->giakhuyenmai * $orderdetail->soluong}}</td>
                </tr>

                @php
                $totalPrice += $orderdetail->giakhuyenmai * $orderdetail->soluong; 
                @endphp

                @endforeach

            </tbody>
        </table>
    </div>

    <h3 class="d-flex justify-content-end align-items-center">
        Tổng thanh toán &nbsp;<div class="text-danger" style="font-size: 40px;">{{ number_format($totalPrice, 0, ',', '.') }}đ</div>
    </h3>
    @if ($order->trangthai =='đang giao hàng')
    <form action="{{route('donhang.nhanhang',['id'=> $order->id_dathang])}}" method ="post" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-success" onclick="return confirm('Bạn đã nhận dược hàng?')">Đã nhận được hàng</button>
    </form>
    @elseif ($order->trangthai != 'giao thành công' && $order->trangthai != 'đã hủy')
    <form action="{{ route('donhang.huy', ['id' => $order->id_dathang]) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')">Hủy đơn hàng</button>
    </form>
    @elseif ($order->trangthai == 'giao thành công')
    <a href="{{ route('donhang.danhgia', ['id' => $order->id_dathang]) }}" class="btn btn-success">Đánh giá</a>
    @endif
    &nbsp;<a class="btn btn-secondary" href="{{URL::to('/donhang')}}">Quay lại</a>
</div>
@endsection
