<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = [
	'nama','jobdesc', 'isDelete'];
	public function karyawans() {
    	return $this->hasMany('App\Karyawan');
    }
}
