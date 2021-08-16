<?php

use Illuminate\Database\Seeder;

class KaryawansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	$karyawans = array(
            ['id' => 1,
            'no_karyawan' => '00317A101', 
        	'nama'=>'Kevin Andryano',
        	'alamat'=>'JL. Rungkut Mejoyo Utara Blok AA 5',
            'kota'=>'surabaya',
            'provinsi'=>'jawa timur',
            'kontak' => '083112247382',
            'gender' => "Pria",
            'tgl_lahir' => '1996-10-19', 
        	'join_date'=>'2016-05-05',
            'isDelete' => 0,
            'user_id' => 3,
            'jabatan_id' => 3, 
        	'cabang_id'=>1,
            'upline_id' => null],
            ['id' => 2,
            'no_karyawan' => '00317A104', 
        	'nama'=>'Evin Cintiawan',
        	'alamat'=>'JL. Rungkut Mejoyo Selatan Blok AJ 13',
            'kota'=>'surabaya',
            'provinsi'=>'jawa timur',
            'kontak' => '083112247382',
            'gender' => "Pria",
            'tgl_lahir' => '1997-06-11', 
        	'join_date'=>'2016-05-10',
            'isDelete' => 0,
            'user_id' => 4,
            'jabatan_id' => 3, 
        	'cabang_id'=>1,
            'upline_id' => 1],
            ['id' => 3,
            'no_karyawan' => '00317A105', 
        	'nama'=>'Sonny Haryadi',
        	'alamat'=>'JL. Rungkut Mejoyo Selatan Blok AJ 13',
            'kota'=>'surabaya',
            'provinsi'=>'jawa timur',
            'kontak' => '081132247684',
            'gender' => "Pria",
            'tgl_lahir' => '1995-12-22', 
        	'join_date'=>'2016-05-11',
            'isDelete' => 0,
            'user_id' => 5,
            'jabatan_id' => 3, 
        	'cabang_id'=>1,
            'upline_id' => 2],
            ['id' => 4,
            'no_karyawan' => '00317A107', 
        	'nama'=>'Billie Arianto',
        	'alamat'=>'JL. Rungkut Mejoyo Utara Blok AN 54',
            'kota'=>'surabaya',
            'provinsi'=>'jawa timur',
            'kontak' => '085852439187',
            'gender' => "Pria",
            'tgl_lahir' => '1996-04-19', 
        	'join_date'=>'2016-05-12',
            'isDelete' => 0,
            'user_id' => 6,
            'jabatan_id' => 3, 
        	'cabang_id'=>1,
            'upline_id' => 3],
            );
        DB::table('karyawans')->insert($karyawans);
    }
}
