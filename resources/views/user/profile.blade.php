<?php

use App\Models\Khachhang;
use Illuminate\Support\Facades\Auth;
?>

@extends('layout')
@section('content')

<style>
    .container {
        margin-top: 4vw;
        margin-bottom: 2vw;
    }

    @media (max-width: 768px) {
        .container {
            margin-top: 8vw;
        }
    }
</style>
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
<?php $user = Auth::user(); ?>
<?php $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first(); ?>
<div class="container">
    <h2>Hồ sơ cá nhân</h2>
    <form action="{{route('profile.update')}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Họ và tên:</label>
            <input type="text" id="name" name="hoten" class="form-control" value="{{$khachhang->hoten}}" required>
        </div>
        <div class="form-group">
            <label for="name">Số điện thoại:</label>
            <input type="text" id="phone" name="sdt" class="form-control" value="{{$khachhang->sdt}}" required>
        </div>
        <div class="form-group">
            <label for="name">Địa chỉ:</label>
            <textarea name="diachi" id="address" class="form-control" rows="3" required>{{$khachhang->diachi}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a class="btn btn-secondary" href="{{URL::to('/')}}">Quay lại</a>
    </form>
</div>
@endsection