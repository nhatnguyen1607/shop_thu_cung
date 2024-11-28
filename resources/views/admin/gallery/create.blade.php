@extends('admin_layout')
@section('admin_content')

<h1 class="h3 mb-3"><strong>Thêm gallery</strong></h1>

<form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="anhgallery">Ảnh Gallery</label>
        <input type="file" name="anhgallery" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>

@endsection
