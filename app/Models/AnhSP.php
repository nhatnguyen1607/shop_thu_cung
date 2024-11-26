<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhSP extends Model
{
    use HasFactory;

    protected $fillable = ['id_sanpham', 'anhsp'];
    public $timestamps = false;
    public function sanpham()
    {
        return $this->belongsTo(Sanpham::class, 'id_sanpham');
    }
}
