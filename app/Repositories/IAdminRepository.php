<?php
namespace App\Repositories;

interface IAdminRepository{
    public function signIn($data);
    public function logOut();
    public function getOrderView();
    public function totalsCustomer();
    public function totalsOrders();
    public function totalsMoney();
    public function totalsSaleProducts();
}