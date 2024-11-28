<?php

namespace App\Repositories;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Collection;

class GalleryRepository implements IGalleryRepository{
    public function getAll(): Collection{
        return Gallery::all();
    }
    public function findById(int $id): ?object
    {
        return Gallery::find($id);
    }
    public function create(array $data): object
    {
        return Gallery::create($data);
    }
    public function update(int $id, array $data): bool
    {
        $gallery = Gallery::find($id);
        if($gallery){
            return $gallery->update($data);
        }
        return false;
    }
    public function delete(int $id): bool
    {
        $gallery = Gallery::find($id);
        if($gallery){
            return $gallery->delete();
        }
        return false;
    }
}