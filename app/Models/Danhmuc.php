<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'danhmuc';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_danhmuc';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ten_danhmuc', 
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Relationships
     */

    // Định nghĩa mối quan hệ hasMany tới bảng `sanpham`
    public function sanphams()
    {
        return $this->hasMany(Sanpham::class, 'id_danhmuc', 'id_danhmuc');
    }
}
