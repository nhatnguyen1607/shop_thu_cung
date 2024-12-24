<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khachhang;
use App\Models\Taikhoan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Bạn cần đăng nhập để xem thông tin tài khoản.');
        }
        return view('user.profile');
    }
    public function update(Request $request){
        Log::info('Dữ liệu nhận được:', $request->all());
        $request->validate([
            'hoten' => 'required|string|max:255',
            'sdt'   => [
                'required',
                'regex:/^0[0-9]{9}$/',
            ],
            'diachi'=> 'required|string|max:500',
        ], [
            'sdt.required' => 'Vui lòng nhập số điện thoại.',
            'sdt.regex'    => 'Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số và bắt đầu bằng số 0.',
        ]);
        $khachhang = Khachhang::where('idtaikhoan', Auth::id())->first();
        $khachhang->hoten = $request->hoten;
        $khachhang->sdt = $request->sdt;
        $khachhang->diachi = $request->diachi;
        $khachhang->save();
        
        return back()->with('success', 'Cập nhật thông tin tài khoản thành công');
    }

}
