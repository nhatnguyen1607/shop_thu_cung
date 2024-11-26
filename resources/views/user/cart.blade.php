<?php

use App\Models\Khachhang;
use Illuminate\Support\Facades\Auth;
?>
@extends('layout')
@section('content')

<style>
    /* Styles for quantity input and buttons */
    .quantity-input {
        display: flex;
        align-items: center;
    }

    .quantity-btn {
        background-color: #ff4500;
        border: none;
        color: #fff;
        cursor: pointer;
        padding: 8px 15px;
        transition: background-color 0.3s ease, color 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        font-weight: bold;
        font-size: 14px;
    }

    .quantity-btn:hover {
        background-color: #ff5a1f;
    }

    .quantity-field::-webkit-outer-spin-button,
    .quantity-field::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .quantity-field {
        width: 50px;
        text-align: center;
        padding: 8px 0px;
        outline: none;
        border: none;
    }
</style>

<div class="body">

    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
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
            @php $total = 0; @endphp

            <!-- Lấy giỏ hàng của người dùng đăng nhập -->
            @php
            $user = Auth::user();
            $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first();
            $userId =$khachhang->id_kh; // Lấy ID người dùng đã đăng nhập
            $cartItems = \DB::table('giohang')
            ->join('sanpham', 'giohang.sanpham_id', '=', 'sanpham.id_sanpham')
            ->select('giohang.*', 'sanpham.tensp', 'sanpham.giasp', 'sanpham.anhsp', 'sanpham.giamgia', 'sanpham.giakhuyenmai')
            ->where('giohang.khachhang_id', $userId)
            ->get();
            @endphp


            @if($cartItems->isNotEmpty())
            @foreach($cartItems as $item)
            @php $total += $item->giakhuyenmai * $item->quantity; @endphp

            <tr data-id="{{ $item->id }}">
                <td><img src="{{ asset($item->anhsp) }}" width="100" height="100" class="img-responsive" /></td>
                <td>
                    <div>{{ $item->tensp }}</div>
                    <button class="btn btn-danger btn-sm cart_remove mt-2"><i class="fa fa-trash-o"></i> Xóa</button>
                </td>
                <td data-th="Price">{{ $item->giasp }}</td>
                <td data-th="Price">{{ $item->giamgia }}%</td>
                <td data-th="Subtotal" class="text-center">{{ $item->giakhuyenmai }}đ</td>

                <td data-th="Quantity" class="quantity-input">
                    <button class="quantity-btn decreaseValue">-</button>
                    <input class="quantity-field cart_update" type="number" min="1" max="999" value="{{ $item->quantity }}">
                    <button class="quantity-btn increaseValue">+</button>
                </td>

                <td data-th="" class="text-center">{{ $item->giakhuyenmai * $item->quantity }}đ</td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="text-right">
                    <h3 class="d-flex justify-content-end align-items-center">
                        Tổng thanh toán &nbsp;<div class="text-danger" style="font-size: 40px;">{{ number_format($total, 0, ',', '.') }}đ</div>
                    </h3>
                </td>
            </tr>

            <tr>
                <td colspan="7" class="text-right">
                    <a href="{{ url('/') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Tiếp tục mua sắm</a>
                    <button class="btn btn-success"><a class="text-white" href="{{ route('order_from_cart') }}">Mua hàng</a></button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<script type="text/javascript">
    document.querySelectorAll('.decreaseValue').forEach(decreaseValue => {
        decreaseValue.addEventListener('click', function(e) {
            e.preventDefault();
            const row = this.closest('tr');
            const quantityInput = row.querySelector('.quantity-field');
            let value = parseInt(quantityInput.value, 10); 
            if (value > 1) {
                value--; 
                quantityInput.value = value; 
                updateCart(row, value); 
            }
        });
    });

    document.querySelectorAll('.increaseValue').forEach(increaseValue => {
        increaseValue.addEventListener('click', function(e) {
            e.preventDefault();
            const row = this.closest('tr');
            const quantityInput = row.querySelector('.quantity-field');
            let value = parseInt(quantityInput.value, 10); 
            value++; 
            quantityInput.value = value;
            updateCart(row, value); 
        });
    });



    document.querySelectorAll('.cart_update').forEach(cart_update => {
        cart_update.addEventListener('change', function(e) {
            const row = this.closest('tr');
            const value = parseInt(this.value, 10);
            if (value > 0) {
                updateCart(row, value);
            }
        });
    });

    document.querySelectorAll('.cart_remove').forEach(cart_remove => {
        cart_remove.addEventListener('click', function(e) {
            const row = this.closest('tr');
            if (confirm("Bạn có thật sự muốn xóa?")) {
                removeFromCart(row);
            }
        });
    });

    function updateCart(row, quantity) {
        const id = row.getAttribute('data-id');
        $.ajax({
            url: "{{ route('update_cart') }}",
            method: "PATCH",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                quantity: quantity
            },
            success: function(response) {
                // alert(response.success);
                window.location.reload();
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert(xhr.responseJSON.error);
            }
        });
    }



    function removeFromCart(row) {
        const id = row.getAttribute('data-id');
        const khachhang_id = "{{ $khachhang->id_kh ?? 'null' }}";

        $.ajax({
            url: "{{ route('remove_from_cart') }}",
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                khachhang_id: khachhang_id
            },
            success: function(response) {
                if (response.success) {
                    alert(response.success); // Hiển thị thông báo thành công
                    window.location.reload(); // Tải lại trang để thấy sự thay đổi
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Kiểm tra lỗi trong console
                alert(xhr.responseJSON.error); // Hiển thị thông báo lỗi
            }
        });
    }
</script>

@endsection