<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Histori_Transaksi extends Model
{
    protected $fillable = [
	'tipe', 'tanggal','komisi_aktif','keterangan','isDelete'
	];
    public function karyawans(){
        return $this->belongsToMany('App\Karyawan');
    }
    public function incomes(){
        return $this->belongsToMany('App\Income');
    }
}
