@extends('layout')
@section('content')
<style>
    .error-message {
        color: red;
        font-size: 0.9em;
        margin-top: 5px;
    }

    input.error {
        border: 1px solid red; /* Viền đỏ cho ô nhập sai */
    }
</style>

<!--Main-->
<div class="login-form" style="height: unset !important; margin-top: -105px!important;">
    <div class="main" style="padding-top: 180px; padding-bottom: 15px; margin-bottom: 0;">

        @if(Session::has('thongbao'))
        <div class="alert alert-success" role="alert">
            {{Session::get('thongbao')}}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{Session::pull('error')}}
        </div>
        @endif

        <form action="{{route('register')}}" method="POST" class="form" style="width: 400px;" id="form-1">
            @csrf

            <h3 class="heading">Đăng ký tài khoản</h3>
            <div class="dont-have-account">
                Bạn đã có tài khoản? <a class="account-register" href="{{ URL::to('login')}}">Đăng nhập</a>
            </div>

            <div class="spacer"></div>

            <style>
                .form-group {
                    margin-bottom: 0;
                }
            </style>


            <div class="form-group">
                <label class="control-label text-left">Họ và tên</label>
                <div>
                    <input type="text" name="name" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Email</label>
                <div>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Mật khẩu</label>
                <div>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Địa chỉ</label>
                <div>
                    <input type="text" name="address" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Điện thoại</label>
                <div>
                    <input type="text" name="phone" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-left">Ngày sinh</label>
                <div>
                    <input type="date" class="form-control" name="ngaysinh" id="ngaysinh" required />
                </div>
            </div>

            <button type="submit" value="Create" class="form-submit" name="register_submit">Đăng ký</button>

        </form>
    </div>
</div>
<script>
 $(document).ready(function () {
    // Thêm phương thức kiểm tra email tùy chỉnh
    $.validator.methods.email = function (value, element) {
        // Kiểm tra email với regex
        return this.optional(element) || /^[\w\.]+\@\w+\.[a-zA-Z]{2,3}(\.[a-zA-Z]{2,3})?$/.test(value);
    };

    // Sử dụng validate cho form
    $("#form-1").validate({
        errorClass: "error-message", // Class CSS để tạo kiểu cho lỗi
        rules: {
            email: {
                required: true,
                email: true // Kiểm tra email đúng định dạng
            },
            password: {
                required: true,
                minlength: 6 // Mật khẩu tối thiểu 6 ký tự
            }
        },
        messages: {
            email: {
                required: "Vui lòng nhập email",
                email: "Vui lòng nhập đúng định dạng email"
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
                minlength: "Mật khẩu phải có ít nhất 6 ký tự"
            }
        },
        errorPlacement: function (error, element) {
            // Đặt thông báo lỗi ngay dưới input
            error.insertAfter(element);
        }
    });
});


</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


@endsection