<?php

namespace App\Http\Controllers;

use App\Repositories\IEvaluateRepository;
use App\Models\Dathang;
use App\Models\ChitietDonhang;
use App\Models\Sanpham;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EvaluateController extends Controller
{
    protected $evaluateRepository;

    public function __construct(IEvaluateRepository $evaluateRepository)
    {
        $this->evaluateRepository = $evaluateRepository;
    }

    /**
     * Hiển thị form đánh giá cho một đơn hàng.
     */
    public function create($id_dathang)
    {
        $user = Auth::user();
        $dathang = Dathang::where('id_dathang', $id_dathang)->first();
        $chiTietDonHang = ChitietDonhang::where('id_dathang', $id_dathang)->first();

        return view('user.danhgia', ['id_sanpham' => $chiTietDonHang->id_sanpham], ['id_kh' => $chiTietDonHang->id_kh]);
    }

    /**
     * Lưu đánh giá mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'noidung' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        // Sử dụng repository để lưu đánh giá
        $this->evaluateRepository->create($request->only(['noidung', 'rating', 'id_sanpham', 'id_kh']));

        return redirect('/')->with('message', 'Đánh giá của bạn đã được gửi thành công!');
    }

}
