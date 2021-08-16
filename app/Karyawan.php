<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
   protected $fillable = [
	'no_karyawan', 'nama', 'alamat','kota','provinsi','kontak','gender','tgl_lahir','join_date','idDelete','user_id','jabatan_id','cabang_id','upline_id'
	];
    public function user() {
    	return $this->belongsTo('App\User');
    }
    public function jabatan(){
    	return $this->belongsTo('App\Jabatan');
    }
    public function cabang(){
    	return $this->belongsTo('App\Cabang');	
    }
    public function upline(){
    	return $this->belongsTo('App\Karyawan');	
    }
    public function incomes(){
        return $this->belongsToMany('App\Income');
    }
    public function histori_transaksis(){
        return $this->belongsToMany('App\Histori_Transaksi');
    }
}
