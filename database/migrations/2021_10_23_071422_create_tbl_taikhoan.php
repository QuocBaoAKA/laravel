<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTaikhoan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_taikhoan', function (Blueprint $table) {
            $table->string('tendangnhap');
            $table->text('matkhau');
            $table->string('hoten');
            $table->string('gioitinh');
            $table->string('diachi');
            $table->string('email');
            $table->string('sodienthoai');
            $table->date('ngaytao');
            $table->integer('maquyen');
            $table->integer('trangthai');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_taikhoan');
    }
}
