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
    public function create($id_dathang)
    {
        $chiTietDonHang = ChitietDonhang::where('id_dathang', $id_dathang)->first();
        $sanpham = Sanpham::where('id_sanpham', $chiTietDonHang->id_sanpham)->first();
        return view('user.danhgia', [
            'id_sanpham' => $chiTietDonHang->id_sanpham,
            'id_kh' => $chiTietDonHang->id_kh,
            'tensp' => $chiTietDonHang->tensp,
            'sanpham' => $sanpham
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'noidung' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        $this->evaluateRepository->create($request->only(['noidung', 'rating', 'id_sanpham', 'id_kh']));

        return redirect('/')->with('success', 'Đánh giá của bạn đã được gửi thành công!');
    }
    public function filter(Request $request)
    {
        $id_sanpham = $request->input('id_sanpham');
        $rating = $request->input('rating') ?? 'all';
        $danhgias = $this->evaluateRepository->filterReviews($id_sanpham, $rating);
        return view('partials.reviews', ['danhgias' => $danhgias])->render();
    }
}
