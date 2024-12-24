@extends('admin_layout')
@section('admin_content')

<h1 class="h3 mb-3"><strong>Danh sách banner</strong></h1>

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

<a class="btn btn-primary" href="{{route('banner.create')}}">Thêm banner</a>

<table class="table mt-3">
  <thead>
    <tr>
      <th>STT</th>
      <th>Ảnh Banner</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>
    @foreach($banners as $banner)
    <tr>
      <td>{{$loop->iteration}}</td>
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