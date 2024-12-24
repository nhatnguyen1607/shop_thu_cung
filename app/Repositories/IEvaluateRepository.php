<?php

namespace App\Repositories;

interface IEvaluateRepository
{
    public function getAll();
    public function findById($id);
    public function create(array $data);  
    public function filterReviews($id_sanpham, $rating);
}
