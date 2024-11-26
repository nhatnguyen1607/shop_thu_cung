@extends('layouts.admin') <!-- Thay đổi đường dẫn nếu cần -->

@section('content')
<div class="container">
    <h1>Danh sách thành viên</h1>

    <!-- Tìm kiếm -->
    <form action="{{ route('thanhvien.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo tên hoặc email" value="{{ request()->input('search') }}">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </div>
    </form>

    <!-- Bảng danh sách thành viên -->
    <table class="table">
        <thead>
            <tr>
                <th>Tên</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @if($members->isEmpty())
                <tr>
                    <td colspan="4" class="text-center">Không tìm thấy thành viên nào.</td>
                </tr>
            @else
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->hoten }}</td>
                        <td>{{ $member->sdt }}</td>
                        <td>{{ $member->diachi }}</td>
                        <td>{{ $member->email }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <!-- Phân trang -->
    {{ $members->links() }}
</div>
@endsection
