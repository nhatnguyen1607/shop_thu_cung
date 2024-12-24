@extends('admin_layout')
@section('admin_content')

<h1 class="h3 mb-3"><strong>Danh sách danh mục</strong></h1>

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

<a class="btn btn-primary" href="{{route('danhmuc.create')}}">Thêm danh mục</a>

<table class="table">
  <thead>
    <tr>
      <th>STT</th>
      <th>Tên danh mục</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>

  <tbody>
    @foreach($Danhmucs as $danhmuc)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$danhmuc->ten_danhmuc}}</td>
      <td colspan="2">
        <a href="{{ route('danhmuc.edit', ['danhmuc' => $danhmuc]) }}" class="btn btn-warning mb-2" style="width:100px;">Chỉnh sửa</a>
        <form method="post" action="{{route('danhmuc.destroy', ['danhmuc' => $danhmuc])}}">
          @csrf
          @method('delete')
          <input type="submit" class="btn btn-danger" value="Xóa" style="width:100px;"
            onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection