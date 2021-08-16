<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori__transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipe',50);
            $table->date('tanggal');
            $table->float('komisi_aktif',12,2);
            $table->text('keterangan');
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
        Schema::drop('histori__transaksis');
    }
}
