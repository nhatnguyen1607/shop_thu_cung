<?php

namespace App\Repositories;

use App\Repositories\IOrderRepository;
use App\Models\Dathang;

use Illuminate\Support\Facades\DB;

class OrderRepository implements IOrderRepository
{

    public function allOrder($filterStatus = null)
    {
        $query= Dathang::query();
        if(!empty($filterStatus)){
            $query->where('trangthai', $filterStatus);
        }
        $query->orderBy('id_dathang','desc');
        return $query->paginate(10);
    }
    public function findOrder($id)
    {
        return Dathang::where('id_dathang', $id)->first();
    }
    public function findDetailProduct($id)
    {
        return DB::table('chitiet_donhang')
            ->join('dathang', 'chitiet_donhang.id_dathang', '=', 'dathang.id_dathang')
            ->select('chitiet_donhang.*')
            ->where('dathang.id_dathang', $id)
            ->get();
    }
    public function findUser($id)
    {
        return DB::table('khachhang')
            ->join('dathang', 'khachhang.id_kh', '=', 'dathang.id_kh')
            ->join('taikhoan', 'khachhang.idtaikhoan', '=', 'taikhoan.idtaikhoan')
            ->select('khachhang.hoten', 'khachhang.sdt', 'khachhang.diachi', 'taikhoan.email')
            ->where('dathang.id_dathang', $id)
            ->first();
    }
    public function updateOrder($data, $id)
    {
        $this->findOrder($id)->update($data);
    }

    public function orderView($id)
    {
        return Dathang::where('id_kh', $id)->orderBy('id_dathang','desc')->get();
    }
}
