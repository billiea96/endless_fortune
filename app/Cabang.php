<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $fillable = [
	'nama','kota', 'alamat', 'provinsi','kecamatan','kode_pos','isDelete'];
	public function karyawans() {
    	return $this->hasMany('App\Karyawan');
    }
}
