@extends('layout')
@section('content')
<div class="container" style="max-width: 600px; margin: 0 auto; margin-top:3vw; margin-bottom:2vw">
    <h1 class="text-center">Đánh giá sản phẩm</h1>

    <form action="{{ route('danhgia.store') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <input type="hidden" name="id_sanpham" value="{{ $id_sanpham }}">
        <input type="hidden" name="id_kh" value="{{ $id_kh }}">

        <div class="form-group text-center">
            <label for="rating" class="d-block mb-3">Đánh giá:</label>
            <div id="rating" class="rating-stars">
                @for ($i = 5; $i >= 1; $i--)
                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required>
                <label for="star{{ $i }}" class="star">&#9733;</label>
                @endfor
            </div>
        </div>

        <div class="form-group" style="margin-top: 20px;">
            <label for="noidung">Nội dung:</label>
            <textarea id="noidung" name="noidung" class="form-control" rows="5" placeholder="Nhập nội dung đánh giá của bạn..." required></textarea>
        </div>

        <div class="text-center" style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
        </div>
    </form>
</div>

<style>
    .container {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .rating-stars {
        direction: rtl;
        display: inline-flex;
        justify-content: center;
    }

    .rating-stars input {
        display: none;
    }

    .rating-stars .star {
        font-size: 30px;
        color: #ccc;
        cursor: pointer;
        margin: 0 5px;
    }

    .rating-stars input:checked ~ .star,
    .rating-stars input:hover ~ .star {
        color: gold;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .form-control {
        font-size: 16px;
    }

    button {
        padding: 10px 20px;
        font-size: 16px;
    }
</style>
@endsection
