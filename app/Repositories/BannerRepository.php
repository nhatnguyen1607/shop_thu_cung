<?php

namespace App\Repositories;
use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;

class BannerRepository implements IBannerRepository{
    public function getAll(): Collection{
        return Banner::all();
    }
    public function findById(int $id): ?object
    {
        return Banner::find($id);
    }
    public function create(array $data): object
    {
        return Banner::create($data);
    }
    public function update(int $id, array $data): bool
    {
        $banner = Banner::find($id);
        if($banner){
            return $banner->update($data);
        }
        return false;
    }
    public function delete(int $id): bool
    {
        $banner = Banner::find($id);
        if($banner){
            return $banner->delete();
        }
        return false;
    }
}