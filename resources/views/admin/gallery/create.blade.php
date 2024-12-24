@extends('admin_layout')
@section('admin_content')

<h1 class="h3 mb-3"><strong>Thêm gallery</strong></h1>

<form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="anhgallery">Ảnh Gallery</label>
        <input type="file" name="anhgallery" class="form-control" id="image" required>
    </div>
    <div id="imagePreview" class="mb-3"></div>

    <button type="submit" class="btn btn-primary">Thêm</button>
    <a class="btn btn-secondary" href="{{URL::to('/admin/gallery')}}">Quay lại</a>
</form>
<script>
    document.getElementById('image').addEventListener('change', function() {
        const file = this.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;

            // Đặt chiều cao của hình ảnh
            img.style.height = '200px';

            document.getElementById('imagePreview').innerHTML = '';
            document.getElementById('imagePreview').appendChild(img);
        };

        reader.readAsDataURL(file);
    });
</script>
@endsection