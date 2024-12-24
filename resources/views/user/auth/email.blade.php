@extends('layout')

@section('content')
<div class="login-form">
    <div class="height360">
        <div class="main">
            @if(Session::has('error'))
            <div id="errorMessage" class="alert alert-success" role="alert">
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
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <h3 class="heading">Lấy lại mật khẩu</h3>

                <div class="form-group">
                    <label for="email" class="form-label">Nhập email của bạn</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <button type="submit" class="form-submit">Gửi link đặt lại mật khẩu</button>
            </form>
        </div>
    </div>
</div>
@endsection