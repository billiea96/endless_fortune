<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan_Histori_Income extends Model
{
    protected $fillable = [
	'karyawan_id', 'histori_transaksi_id','income_id','jumlah_unit','nominal'
	];
}
