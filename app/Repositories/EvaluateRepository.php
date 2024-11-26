<?php

namespace App\Repositories;

use App\Models\DanhgiaSanpham;

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
}
