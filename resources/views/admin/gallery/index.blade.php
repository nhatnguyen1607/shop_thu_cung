@extends('admin_layout')
@section('admin_content')

<h1 class="h3 mb-3"><strong>Danh sách gallery</strong></h1>

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

<a class="btn btn-primary" href="{{route('gallery.create')}}">Thêm gallery</a>

<table class="table mt-3">
  <thead>
    <tr>
      <th>STT</th>
      <th>Ảnh gallery</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>
    @foreach($gallerys as $gallery)
    <tr>
      <td>{{ $loop->iteration }}</td>
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