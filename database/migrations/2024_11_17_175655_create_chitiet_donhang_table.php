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
        Schema::create('chitiet_donhang', function (Blueprint $table) {
            $table->increments('id_ctdonhang');
            $table->string('tensp', 100);
            $table->tinyInteger('soluong')->nullable();
            $table->integer('giamgia')->nullable();
            $table->integer('giatien')->nullable();
            $table->integer('giakhuyenmai')->nullable();
            $table->unsignedInteger('id_sanpham');
            $table->unsignedInteger('id_dathang');
            $table->unsignedInteger('id_kh');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitiet_donhang');
    }
};
