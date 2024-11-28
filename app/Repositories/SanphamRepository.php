<?php
namespace App\Repositories;

use App\Repositories\ISanphamRepository;
use App\Models\Sanpham;

class SanphamRepository implements ISanphamRepository{

    public function allproduct()
    {
        return Sanpham::orderBy('id_sanpham', 'desc')->take(20)->get();
    }
    public function outstandingproducts()
    {
        return Sanpham::orderBy('id_sanpham', 'desc')->take(10)->get();
    }
    public function randomProduct()
    {
        return Sanpham::inRandomOrder()->take(10)->get();
    }
    // public function dog_products()
    // {
    //     return Sanpham::where('id_danhmuc', 1)->orderBy('id_sanpham', 'desc')->take(6)->get();
    // }
    // public function cat_products()
    // {
    //     return Sanpham::where('id_danhmuc', 2)->orderBy('id_sanpham', 'desc')->take(5)->get();
    // }
    public function dog()
    {
        return Sanpham::where('id_danhmuc', 1)->orderBy('id_sanpham', 'desc')->get();
    }
    public function cat()
    {
        return Sanpham::where('id_danhmuc', 2)->orderBy('id_sanpham', 'desc')->get();
    }
    public function searchProduct($data)
    {
        $searchKeyword = $data->input('tukhoa');
        return Sanpham::where('tensp', 'like', '%' . $searchKeyword . '%')->paginate(5);
    }
    public function viewAllWithPagi()
    {
        return Sanpham::paginate(10);
    }
    

}