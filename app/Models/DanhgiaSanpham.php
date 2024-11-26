<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhgiaSanpham extends Model
{
    use HasFactory;

    protected $table = 'danhgiasanpham'; 
    protected $primaryKey = 'iddanhgia'; 

    protected $fillable = [
        'noidung',
        'rating',
        'id_sanpham',
        'id_kh',
    ];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'id_sanpham');
    }

    public function khachhang()
    {
        return $this->belongsTo(KhachHang::class, 'id_kh');
    }
    public $timestamps = false;
}
