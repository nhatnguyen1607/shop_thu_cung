@extends('admin_layout')
@section('admin_content')

<h1 class="h3 mb-3"><strong>Chỉnh sửa gallery</strong></h1>

<form action="{{ route('gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="anhgallery">Ảnh gallery</label>
        <input type="file" name="anhgallery" class="form-control">
        @if($gallery->anhgallery)
            <img src="{{ asset($gallery->anhgallery) }}" alt="gallery" style="width: 200px; height: auto;" class="mt-3">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

@endsection
