<?php

namespace App\Repositories;

use App\Models\DanhgiaSanpham;
use Illuminate\Support\Facades\DB; 

class EvaluateRepository implements IEvaluateRepository
{
    public function getAll()
    {
        return DanhgiaSanpham::all();
    }

    public function findById($id)
    {
        return DanhgiaSanpham::where('id_sanpham', $id)
            ->join('khachhang', 'danhgiasanpham.id_kh', '=', 'khachhang.id_kh')
            ->select('danhgiasanpham.*', 'khachhang.hoten')
            ->get();
    }

    public function create(array $data)
    {
        return DanhgiaSanpham::create($data);
    }

    public function filterReviews($id_sanpham, $rating)
    {
        $reviews = DB::table('danhgiasanpham')
            ->join('khachhang', 'danhgiasanpham.id_kh', '=', 'khachhang.id_kh')
            ->where('danhgiasanpham.id_sanpham', $id_sanpham);

        if ($rating != 'all') {
            $reviews = $reviews->where('danhgiasanpham.rating', $rating);
        }
        return $reviews->select('danhgiasanpham.*', 'khachhang.hoten')->get();
    }

}
