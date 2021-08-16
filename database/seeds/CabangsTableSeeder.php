<?php

use Illuminate\Database\Seeder;

class CabangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cabangs = array(
        	['id' => 1,
             'kota' => 'surabaya', 
        	 'alamat'=>'JL. Klampis No.33',
        	 'provinsi' =>'Jawa Timur',
             'kecamatan' => 'Sukolilo', 
             'kelurahan'=>'Dukuh Suterejo',
             'kode_pos' => '60117',
             'isDelete' => 0],
             ['id' => 2,
             'kota' => 'surabaya', 
        	 'alamat'=>'JL. Pucang Anom No.99',
        	 'provinsi' =>'Jawa Timur',
             'kecamatan' => 'Gubeng', 
             'kelurahan'=>'kertajaya',
             'kode_pos' => '60282',
             'isDelete' => 0],
            );
        DB::table('cabangs')->insert($cabangs);
    }
}
