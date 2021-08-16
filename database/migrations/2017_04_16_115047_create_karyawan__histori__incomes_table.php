<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawanHistoriIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan__histori__incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('karyawan_id')->unsigned();
            $table->foreign('karyawan_id')->references('id')->on('karyawans');
            $table->integer('histori_transaksi_id')->unsigned();
            $table->foreign('histori_transaksi_id')->references('id')->on('histori__transaksis');
            $table->integer('income_id')->unsigned();
            $table->foreign('income_id')->references('id')->on('incomes');
            $table->integer('jumlah_unit');
            $table->float('nominal',12,0);
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
        Schema::drop('karyawan__histori__incomes');
    }
}
