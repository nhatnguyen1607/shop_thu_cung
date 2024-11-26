@extends('admin_layout')
@section('admin_content')

<h1 class="h3 mb-3"><strong>Danh sách banner</strong></h1>

<div class="">
  @if(session()->has('success'))
  <div class="alert alert-success mb-3">
    {{session('success')}}
  </div>
  @endif
</div>

<a class="btn btn-primary" href="{{route('banner.create')}}">Thêm banner</a>

<table class="table mt-3">
  <thead>
    <tr>
      <th>Id</th>
      <th>Ảnh Banner</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>
    @foreach($banners as $banner)
    <tr>
      <td>{{$banner->id}}</td>
      <td>
        <img src="{{asset( $banner->anhbanner)}}" alt="Banner" style="width:200px; height:auto;">
      </td>
      <td>
        <div class="d-flex justify-content-start">

          <form method="post" action="{{route('banner.delete', $banner)}}" style="display: inline-block;">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Xóa"
              onclick="return confirm('Bạn có chắc chắn muốn xóa banner này không?')">
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection