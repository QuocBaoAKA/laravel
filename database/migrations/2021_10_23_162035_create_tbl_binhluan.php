<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBinhluan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_binhluan', function (Blueprint $table) {
            $table->Increments('matrangthai');
            $table->string('tentrangthai');
            $table->date('thoigianbinhluan');
            $table->string('tendangnhap');
            $table->integer('masanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_binhluan');
    }
}
