<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dathang extends Model
{
    protected $table = 'dathang';
    protected $primaryKey = 'id_dathang';

    protected $fillable = [
        'madathang', 
        'makh', 
        'id_kh', 
        'ngaydathang', 
        'ngaygiaohang', 
        'tongtien', 
        'phuongthucthanhtoan', 
        'diachigiaohang', 
        'trangthai', 
        'giaohang'
    ];

    protected $casts = [
        'id_dathang' => 'int', 
        'madathang' => 'string', 
        'makh' => 'string', 
        'id_kh' => 'int', 
        'ngaydathang' => 'datetime', 
        'ngaygiaohang' => 'datetime', 
        'tongtien' => 'int', 
        'phuongthucthanhtoan' => 'string', 
        'diachigiaohang' => 'string', 
        'trangthai' => 'string', 
        'giaohang' => 'string'
    ];

    protected $dates = [
        'ngaydathang', 
        'ngaygiaohang'
    ];

    public $timestamps = false;

    // Quan hệ
    public function khachhang()
    {
        return $this->belongsTo(Khachhang::class, 'id_kh');
    }

    public function chitietdonhang()
    {
        return $this->hasMany(ChitietDonhang::class, 'id_dathang');
    }

    // Phương thức
    public function totalAmount()
    {
        return $this->chitietdonhang()->sum(DB::raw('giatien * soluong'));
    }

    public function isDelivered()
    {
        return $this->trangthai === 'đã giao';
    }

    public function markAsDelivered()
    {
        $this->trangthai = 'đã giao';
        $this->save();
    }

    // Scope
    public function scopePending($query)
    {
        return $query->where('trangthai', 'đang xử lý');
    }
}
