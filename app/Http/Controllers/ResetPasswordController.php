<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        return view('user.auth.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'token' => 'required'
        ], [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);
        
        $message = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        if ($message === Password::PASSWORD_RESET) {
            $message='Mật khẩu đã được thay đổi!';
            return redirect()->route('login')->with(['success'=> __($message)]);
        }
        if ($message === Password::INVALID_TOKEN) {
            return back()->withErrors(['token' => 'Mã khôi phục mật khẩu không hợp lệ. Vui lòng nhập đúng email']);
        }
        return back()->withErrors(['email' => [__($message)]]);
    }
}

