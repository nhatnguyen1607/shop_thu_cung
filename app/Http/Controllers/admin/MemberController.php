<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\AccountLocked;
use App\Mail\AccountUnlocked;
use App\Models\Khachhang;
use App\Models\Taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Khachhang::join('taikhoan', 'khachhang.idtaikhoan', '=', 'taikhoan.idtaikhoan')
            ->select('khachhang.hoten', 'khachhang.sdt', 'khachhang.diachi', 'taikhoan.email', 'taikhoan.trangthai', 'taikhoan.idtaikhoan');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('khachhang.hoten', 'like', "%{$search}%")
                    ->orWhere('taikhoan.email', 'like', "%{$search}%");
            });
        }

        $members = $query->paginate(10);

        return view('admin.thanhvien.index', compact('members', 'search'));
    }

    public function lock($id)
    {
        $taikhoan = Taikhoan::findOrFail($id);
        $taikhoan->trangthai = 'lock'; 
        $taikhoan->save();
        Mail::to($taikhoan->email)->send(new AccountLocked($taikhoan->email));
        return redirect()->route('admin.thanhvien.index')->with('success', 'Đã khóa tài khoản.');
    }


    public function unlock($id)
    {
        $taikhoan = Taikhoan::findOrFail($id);
        $taikhoan->trangthai = 'unlock'; 
        $taikhoan->save();
        Mail::to($taikhoan->email)->send(new AccountUnlocked($taikhoan->email));
        return redirect()->route('admin.thanhvien.index')->with('success', 'Đã mở khóa tài khoản.');
    }
}
