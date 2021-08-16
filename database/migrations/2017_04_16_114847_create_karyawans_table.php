<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_karyawan', 50)->unique();
            $table->string('nama', 100);
            $table->string('alamat', 100);
            $table->string('kota', 50);
            $table->string('provinsi', 50);
            $table->string('kontak', 50);
            $table->string('gender', 20);
            $table->date('tgl_lahir');
            $table->date('join_date');
            $table->boolean('isDelete');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('jabatan_id')->unsigned();
            $table->foreign('jabatan_id')->references('id')->on('jabatans');
            $table->integer('cabang_id')->unsigned();
            $table->foreign('cabang_id')->references('id')->on('cabangs');
            $table->integer('upline_id')->unsigned()->nullable();
            $table->foreign('upline_id')->references('id')->on('karyawans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('karyawans');
    }
}
