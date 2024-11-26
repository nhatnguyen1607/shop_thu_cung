<?php

use App\Models\Khachhang;
use Illuminate\Support\Facades\Auth;
?>

@extends('layout')
@section('content')

<style>
    .container{
        margin-top: 4vw;
        margin-bottom: 2vw;
    }
    @media (max-width: 768px) {
        .container{
            margin-top: 8vw;
        }
    }
</style>
@if(session('success'))
<div class="alert alert-success mt-3">
    {{ session('success') }}
</div>
@endif
<?php $user = Auth::user(); ?>
<?php $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first(); ?>
<div class="container" >
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
    </form>
</div>
@endsection