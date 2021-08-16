<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kota', 100);
            $table->string('alamat', 100);
            $table->string('provinsi', 100);
            $table->string('kecamatan', 100);
            $table->string('kelurahan', 100);
            $table->string('kode_pos', 100);
            $table->boolean('isDelete');
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
        Schema::drop('cabangs');
    }
}
