<?php
namespace App\Repositories;

interface ISanphamRepository{
    public function allproduct();
    public function outstandingproducts();
    public function randomProduct();
    public function dog();
    public function cat();
    public function searchProduct($data);
    public function viewAllWithPagi();
}