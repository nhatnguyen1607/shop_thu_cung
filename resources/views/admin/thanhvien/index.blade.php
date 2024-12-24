@extends('admin_layout')

@section('admin_content')
<h1 class="h3 mb-3"><strong>Danh sách thành viên</strong></h1>

<!-- Tìm kiếm -->
<form action="{{ route('admin.thanhvien.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Nhập tên hoặc email để tìm kiếm">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
        </div>
    </div>
</form>
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
<div class="card flex-fill">
    <table class="table table-hover my-0">
        <thead>
            <tr>
                <th>Họ tên</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{ $member->hoten }}</td>
                <td>{{ $member->sdt }}</td>
                <td>{{ $member->diachi }}</td>
                <td>{{ $member->email }}</td>
                <td>
                    @if($member->trangthai === 'unlock')
                    <form action="{{ route('admin.thanhvien.lock', $member->idtaikhoan) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-warning">Khóa tài khoản</button>
                    </form>
                    @else
                    <form action="{{ route('admin.thanhvien.unlock', $member->idtaikhoan) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Mở khóa tài khoản</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Hiển thị phân trang -->
{{ $members->links() }}

@endsection