<?php
namespace App\Repositories;

use App\Repositories\ISanphamRepository;
use App\Models\Sanpham;

class SanphamRepository implements ISanphamRepository
{
    public function allproduct()
    {
        return Sanpham::with(['anhSp' => function($query) {
            $query->orderBy('id_anh', 'asc')->limit(1);  
        }])->orderBy('id_sanpham', 'desc')->take(20)->get();
    }

    public function outstandingproducts()
    {
        return Sanpham::with(['anhSp' => function($query) {
            $query->orderBy('id_anh', 'asc')->limit(1);  
        }])->orderBy('id_sanpham', 'desc')->take(10)->get();
    }

    public function randomProduct()
    {
        return Sanpham::with(['anhSp' => function($query) {
            $query->orderBy('id_anh', 'asc')->limit(1);  
        }])->inRandomOrder()->take(10)->get();
    }

    public function dog()
    {
        return Sanpham::with(['anhSp' => function($query) {
            $query->orderBy('id_anh', 'asc')->limit(1); 
        }])->where('id_danhmuc', 1)->orderBy('id_sanpham', 'desc')->get();
    }

    public function cat()
    {
        return Sanpham::with(['anhSp' => function($query) {
            $query->orderBy('id_anh', 'asc')->limit(1); 
        }])->where('id_danhmuc', 2)->orderBy('id_sanpham', 'desc')->get();
    }

    public function searchProduct($data)
    {
        $searchKeyword = $data->input('tukhoa');
    
        return Sanpham::with(['anhSp' => function($query) {
            $query->orderBy('id_anh', 'asc')->limit(1); 
        }])->where('tensp', 'like', '%' . $searchKeyword . '%')->paginate(10);
    }

    public function viewAllWithPagi()
    {
        return Sanpham::with(['anhSp' => function($query) {
            $query->orderBy('id_anh', 'asc')->limit(1);
        }])->paginate(20);
    }
}
