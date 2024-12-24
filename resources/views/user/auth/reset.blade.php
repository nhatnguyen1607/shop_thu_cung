@extends('layout')

@section('content')
<div class="login-form">
    <div class="height360">
        <div class="main">
            @if ($errors->any())
            <div class="alert alert-danger" id="errorMessage">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
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
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email" class="form-label">Email của bạn</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu mới</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="form-label">Xác nhận mật khẩu mới</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="form-submit">Đặt lại mật khẩu</button>
            </form>
        </div>
    </div>
</div>
@endsection