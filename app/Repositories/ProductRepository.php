<?php
namespace App\Repositories;

use App\Repositories\IProductRepository;
use App\Models\Sanpham;

class ProductRepository implements IProductRepository{

    public function allProduct(){
        return Sanpham::paginate(10);
    }
    public function storeProduct($data){
        return Sanpham::create($data);
    }
    public function findProduct($id){
        return Sanpham::where('id_sanpham', $id)->first();
    }
    public function searchProduct($data)
    {
        $searchKeyword = $data->input('tukhoa');
        return Sanpham::where('tensp', 'like', '%' . $searchKeyword . '%')->paginate(5);
    }
    public function updateProduct($data, $id){
        $this->findProduct($id)->update($data);
    }
    public function deleteProduct($id){
        $this->findProduct($id)->delete();
    }
}