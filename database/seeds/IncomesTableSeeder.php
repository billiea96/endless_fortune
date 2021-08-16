<?php

use Illuminate\Database\Seeder;

class IncomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incomes = array(
        	['id' => 1,
        	'nama' =>'Komisi level 1',
            'komisi' => 0.07, 
            'isDelete' => 0],
            ['id' => 2,
        	'nama' =>'Komisi level 2',
            'komisi' => 0.02, 
            'isDelete' => 0],
            ['id' => 3,
        	'nama' =>'Komisi level 3',
            'komisi' => 0.01, 
            'isDelete' => 0],
            ['id' => 4,
        	'nama' =>'Komisi Priciple',
            'komisi' => 0.06, 
            'isDelete' => 0],
            ['id' => 5,
        	'nama' =>'Komisi Vice Principle',
            'komisi' => 0.04, 
            'isDelete' => 0],
            );
        DB::table('incomes')->insert($incomes);
    }
}
