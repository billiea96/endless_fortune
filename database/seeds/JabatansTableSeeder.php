<?php

use Illuminate\Database\Seeder;

class JabatansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatans = array(
        	['id' => 1,
            'nama' => 'Principle', 
        	'jobdesc'=>'lalalallaalalalallalalal',
            'isDelete' => 0],
        	['id' => 2,
            'nama' => 'Vice Principle', 
        	'jobdesc'=>'lulululululululululululu',
            'isDelete' => 0],
            ['id' => 3,
            'nama' => 'Agent', 
        	'jobdesc'=>'lololololo',
            'isDelete' => 0],
            );
        DB::table('jabatans')->insert($jabatans);
    }
}
