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
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->increments('idtaikhoan'); 
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->unsignedInteger('id_phanquyen'); 
            $table->enum('trangthai', ['unlock', 'lock'])->default('unlock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taikhoan');
    }
};
