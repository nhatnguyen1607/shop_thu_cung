<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('taikhoan', function (Blueprint $table) {
            $table->foreign('id_phanquyen')->references('id_phanquyen')->on('phanquyen')->onDelete('cascade');
        });
        Schema::table('khachhang', function (Blueprint $table) {
            $table->foreign('idtaikhoan')->references('id')->on('taikhoan')->onDelete('cascade');
        });
    
        Schema::table('sanpham', function (Blueprint $table) {
            $table->foreign('id_danhmuc')->references('id_danhmuc')->on('danhmuc')->onDelete('cascade');
        });
    
        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('khachhang_id')->references('id_kh')->on('khachhang')->onDelete('cascade');
            $table->foreign('sanpham_id')->references('id_sanpham')->on('sanpham')->onDelete('cascade');
        });
    
        Schema::table('dathang', function (Blueprint $table) {
            $table->foreign('id_kh')->references('id_kh')->on('khachhang')->onDelete('cascade');
        });
    
        Schema::table('chitiet_donhang', function (Blueprint $table) {
            $table->foreign('id_sanpham')->references('id_sanpham')->on('sanpham')->onDelete('cascade');
            $table->foreign('id_dathang')->references('id_dathang')->on('dathang')->onDelete('cascade');
            $table->foreign('id_kh')->references('id_kh')->on('khachhang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
