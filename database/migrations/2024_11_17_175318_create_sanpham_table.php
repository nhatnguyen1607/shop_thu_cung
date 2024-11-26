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
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id_sanpham');
            $table->string('tensp', 100)->nullable();
            $table->string('anhsp', 255)->nullable();
            $table->integer('giasp')->nullable();
            $table->text('mota')->nullable();
            $table->integer('giamgia')->nullable();
            $table->integer('giakhuyenmai')->nullable();
            $table->integer('soluong')->nullable();
            $table->unsignedInteger('id_danhmuc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};
