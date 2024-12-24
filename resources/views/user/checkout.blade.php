@extends('layout')
@section('content')
<br>

@if(Session::has('error'))
<div id="errorMessage" class="alert alert-danger" role="alert">
    {{ Session::pull('error') }}
</div>
<script>
    setTimeout(function() {
        document.getElementById('errorMessage').style.display = 'none';
    }, 2000);
</script>
@endif

@if(Session::has('success'))
<div id="successMessage" class="alert alert-success" role="alert">
    {{ Session::pull('success') }}
</div>
<script>
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 2000);
</script>
@endif
@php
$order = session('order');
@endphp
<form class="body" action="{{ route('checkout') }}" method="POST" id="checkout" enctype="multipart/form-data">
    @csrf

    @php
    $khachhang = \App\Models\Khachhang::where('idtaikhoan', Auth::user()->idtaikhoan)->first();
    $taikhoan = \App\Models\Taikhoan::where('idtaikhoan', Auth::user()->idtaikhoan)->first();
    @endphp

    @if($khachhang)
    <div class="mb-3 bg-light p-3 my-3">
        <h4>Thông tin khách hàng</h4>
        <div class="d-flex">
            <div class="mr-5 w-50">
                <div style="font-size: 18px;"><strong>Khách hàng:</strong> {{ $khachhang->hoten }}</div>
                <div style="font-size: 18px;"><strong>Email:</strong> {{ $taikhoan->email }}</div>
            </div>
            <div class="w-50">
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
            <tr>
                @php
                $total += $order['giakhuyenmai'] * $order['quantity']; 
                @endphp

                <td><img src="{{ asset($order['anhsp']) }}" width="100" height="100" class="img-responsive" /></td>
                <td>{{ $order['tensp'] }}</td>
                <td>{{ number_format($order['giasp'], 0, ',', '.') }}đ</td>
                <td>{{ $order['giamgia'] }}%</td>
                <td>{{ number_format($order['giakhuyenmai'], 0, ',', '.') }}đ</td>
                <td>{{ $order['quantity'] }}</td>
                <td>{{ number_format($order['giakhuyenmai'] * $order['quantity'], 0, ',', '.') }}đ</td> 

                <input type="hidden" name="id_sanpham[]" value="{{ $order['id'] }}">
                <input type="hidden" name="quantity[]" value="{{ $order['quantity'] }}">
            </tr>
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
                        <!-- <input type="hidden" name="is_from_cart" value="false"> -->
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
        $('#checkout').attr('action', "{{ route('checkout') }}");
    });

    $('#vnpay').click(function() {
        $('#checkout').attr('action', "{{ route('vnpay') }}");
        // $('input[name="is_from_cart"]').val(false);
    });
</script>

@endsection