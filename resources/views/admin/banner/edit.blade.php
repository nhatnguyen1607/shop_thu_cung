@extends('admin_layout')
@section('admin_content')

<h1 class="h3 mb-3"><strong>Chỉnh sửa banner</strong></h1>

<form action="{{ route('banner.update', $banner) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="anhbanner">Ảnh Banner</label>
        <input type="file" name="anhbanner" class="form-control">
        @if($banner->anhbanner)
            <img src="{{ asset($banner->anhbanner) }}" alt="Banner" style="width: 200px; height: auto;" class="mt-3">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

@endsection
