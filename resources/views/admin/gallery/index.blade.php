@extends('admin_layout')
@section('admin_content')

<h1 class="h3 mb-3"><strong>Danh sách gallery</strong></h1>

<div class="">
  @if(session()->has('success'))
  <div class="alert alert-success mb-3">
    {{session('success')}}
  </div>
  @endif
</div>

<a class="btn btn-primary" href="{{route('gallery.create')}}">Thêm gallery</a>

<table class="table mt-3">
  <thead>
    <tr>
      <th>Id</th>
      <th>Ảnh gallery</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>
    @foreach($gallerys as $gallery)
    <tr>
      <td>{{$gallery->id}}</td>
      <td>
        <img src="{{asset( $gallery->anhgallery)}}" alt="gallery" style="width:200px; height:auto;">
      </td>
      <td>
        <div class="d-flex justify-content-start">

          <form method="post" action="{{route('gallery.delete', $gallery->id)}}" style="display: inline-block;">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Xóa"
              onclick="return confirm('Bạn có chắc chắn muốn xóa gallery này không?')">
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection