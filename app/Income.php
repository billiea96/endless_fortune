<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{   
    protected $fillable = [
	'nama', 'komisi','isDelete'
	];
    public function histori_transaksis(){
        return $this->belongsToMany('App\Histori_Transaksi');
    }
    public function karyawans(){
        return $this->belongsToMany('App\Karyawan');
    }
}
