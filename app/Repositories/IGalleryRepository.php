<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Collection;
interface IGalleryRepository{
    public function getAll(): Collection;
    public function findById(int $id): ?object;
    public function create(array $data): object;
    public function update(int $id, array $data):bool;
    public function delete(int $id):bool;
}