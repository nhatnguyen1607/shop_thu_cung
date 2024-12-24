<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khachhang;
use App\Models\Taikhoan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index()
    {
        return view('user.auth.login');
    }

    public function register()
    {
        return view('user.auth.register');
    }

    public function registerPost(Request $request)
    {
        $existingUser = TaiKhoan::where('email', $request->email)->first();

        if ($existingUser) {
            return back()->with('error', 'Email đã được sử dụng');
        }

        try {
            $tk = new TaiKhoan();
            $tk->email = $request->email;
            $tk->password = Hash::make($request->password);
            $tk->id_phanquyen = 2;
            $tk->trangthai = 'unlock';
            $tk->save();

            $khachhang = new Khachhang();
            $khachhang->idtaikhoan = $tk->idtaikhoan;
            $khachhang->hoten = $request->name;
            $khachhang->diachi = $request->address;
            $khachhang->sdt = $request->phone;
            $khachhang->save();
            return redirect()->route('login')->with('success', 'Đăng ký tài khoản thành công');
        } catch (\Exception $e) {
            return back()->with('error', 'Lỗi xảy ra: ' . $e->getMessage());
        }
    }


    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credetials)) {
            $user = Auth::user();
            if ($user->trangthai === 'lock') {
                Auth::logout();
                return back()->with('error', 'Tài khoản của bạn bị khóa. Vui lòng liên hệ admin để xử lí!');
            }
            if ($user->id_phanquyen === 1) {
                Auth::logout();
                return back()->with('error', 'Tài khoản không hợp lệ!');
            }
            return redirect('/')->with('success', 'Đăng nhập thành công');
        }

        return back()->with('error', 'Sai email hoặc mật khẩu');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
