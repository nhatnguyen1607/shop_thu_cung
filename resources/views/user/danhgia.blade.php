@extends('layout')
@section('content')
<div class="container" style="max-width: 600px; margin: 0 auto; margin-top: 3vw; margin-bottom: 2vw; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
    <h1 class="text-center text-primary" style="font-weight: 600;">Đánh giá sản phẩm</h1>

    <form action="{{ route('danhgia.store') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <input type="hidden" name="id_sanpham" value="{{ $id_sanpham }}">
        <input type="hidden" name="id_kh" value="{{ $id_kh }}"> 
        <div class="product-info text-center" style="margin-bottom: 20px;">
            <img src="{{ asset($sanpham->anhSp->first()->anh_sp) }}" style="width: 150px; height: 150px; object-fit: cover; border-radius: 10px; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);" alt="Product Image" />
            <p style="font-size: 18px; font-weight: 500; margin-top: 10px; color: #333;">{{ $tensp }}</p>
        </div>

        <div class="form-group text-center">
            <div id="rating" class="rating-stars">
                @for ($i = 5; $i >= 1; $i--)
                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required>
                <label for="star{{ $i }}" class="star">&#9733;</label>
                @endfor
            </div>
        </div>
        <div class="form-group" style="margin-top: 20px;">
            <label for="noidung" style="font-weight: 500; font-size: 16px; color: #333;">Nội dung:</label>
            <textarea id="noidung" name="noidung" class="form-control" rows="5" placeholder="Nhập nội dung đánh giá của bạn..." required style="font-size: 16px; padding: 10px; border-radius: 5px;"></textarea>
        </div>
        <div class="text-center" style="margin-top: 30px;">
            <button type="submit" class="btn btn-success" style="padding: 10px 25px; font-size: 18px; font-weight: 600; border-radius: 5px;">Gửi đánh giá</button>
        </div>
    </form>
</div>

<style>
    .rating-stars {
        direction: rtl;
        display: inline-flex;
        justify-content: center;
        gap: 8px;
    }

    .rating-stars input {
        display: none;
    }

    .rating-stars .star {
        font-size: 36px;
        color: #ccc;
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .rating-stars input:checked ~ .star,
    .rating-stars input:hover ~ .star {
        color: #ffcc00;
    }

    .form-control {
        border: 1px solid #ddd;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    button {
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    button:hover {
        background-color: #28a745;
        box-shadow: 0 4px 8px rgba(40, 167, 69, 0.4);
    }
</style>
@endsection
