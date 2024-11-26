@extends('layout')
@section('content')
<br>
@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if(session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

<form class="body" action="{{ route('checkoutfromcart') }}" method="POST" id="checkout" enctype="multipart/form-data">
    @csrf

    @php
    $khachhang = \App\Models\Khachhang::where('idtaikhoan', Auth::user()->idtaikhoan)->first();
    $taikhoan = \App\Models\Taikhoan::where('idtaikhoan', Auth::user()->idtaikhoan)->first();
    @endphp

    @if($khachhang)
    <div class="mb-3 bg-light p-3 my-3">
        <h4>Thông tin khách hàng</h4>
        <div class="d-flex">
            <div class="mr-4">
                <div style="font-size: 18px;"><strong>Khách hàng:</strong> {{ $khachhang->hoten }}</div>
                <div style="font-size: 18px;"><strong>Email:</strong> {{ $taikhoan->email }}</div>
            </div>
            <div class="">
                <div style="font-size: 18px;"><strong>Số điện thoại:</strong> {{ $khachhang->sdt }}</div>
                <div style="font-size: 18px;"><strong>Địa chỉ:</strong> {{ $khachhang->diachi }}</div>
            </div>

            <input type="hidden" name="id_kh" value="{{ $khachhang->id_kh }}">
            <input type="hidden" name="hoten" value="{{ $khachhang->hoten }}">
            <input type="hidden" name="email" value="{{ $khachhang->email }}">
            <input type="hidden" name="sdt" value="{{ $khachhang->sdt }}">
            <input type="hidden" name="diachigiaohang" value="{{ $khachhang->diachi }}">
            <input type="hidden" name="ngaydathang" value="{{ now() }}">
        </div>
    </div>
    @endif

    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá gốc</th>
                <th>Giảm giá</th>
                <th>Giá khuyến mại</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if($cartItems->isNotEmpty())
            @foreach($cartItems as $item)
            @php
            $total += $item->giakhuyenmai * $item->quantity; 
            @endphp

            <tr data-id="{{ $item->id }}">
                <td><img src="{{ asset($item->anhsp) }}" width="100" height="100" class="img-responsive" /></td>
                <td>{{ $item->tensp }}</td>
                <td>{{ number_format($item->giasp, 0, ',', '.') }}đ</td>
                <td>{{ $item->giamgia }}%</td>
                <td>{{ number_format($item->giakhuyenmai, 0, ',', '.') }}đ</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->giakhuyenmai * $item->quantity, 0, ',', '.') }}đ</td>

                <input type="hidden" name="id_sanpham[]" value="{{ $item->sanpham_id }}">
                <input type="hidden" name="quantity[]" value="{{ $item->quantity }}">
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center">Giỏ hàng trống!</td>
            </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="bg-light">
                    <div class="d-flex justify-content-between">
                        <h4 class="pttt">Phương thức thanh toán</h4>
                        <div>
                            <div class="d-flex align-items-center p-2">
                                <input type="radio" id="cod" name="redirect" value="COD" checked>
                                <label for="cod" style="margin-bottom: 1px; margin-left: 5px; font-size: 20px;" class="paymentContent font-weight-bold text-xl p">
                                    Trả tiền khi nhận hàng (COD)
                                </label>
                            </div>
                            <div class="d-flex align-items-center p-2">
                                <input type="radio" id="vnpay" name="redirect" value="VNPAY">
                                <label for="vnpay" style="margin-bottom: 1px; margin-left: 5px; font-size: 20px;" class="paymentContent font-weight-bold text-xl p">
                                    Thanh toán online (VNPAY)
                                </label>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="7" class="text-right">
                    <h3 class="d-flex justify-content-end align-items-center">
                        Tổng thanh toán &nbsp;<div class="text-danger" style="font-size: 40px;">{{ number_format($total, 0, ',', '.') }}đ</div>
                        <input type="hidden" name="tongtien" value="{{ $total }}">
                    </h3>
                </td>
            </tr>
            <tr>
                <td colspan="7" class="text-right">
                    <a href="{{ url('/cart') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Quay lại giỏ hàng</a>
                    <button type="submit" class="btn btn-success text-white">Đặt hàng</button>
                </td>
            </tr>
        </tfoot>
    </table>
</form>

<script>
    $('#cod').click(function() {
        $('#checkout').attr('action', "{{ route('checkoutfromcart') }}");
    });

    $('#vnpay').click(function() {
        $('#checkout').attr('action', "{{ route('vnpayfromcart') }}");
        // $('input[name="is_from_cart"]').val(true);
    });
</script>

@endsection