<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penggunas = array(
        	['id' => 1,
            'name' => 'burki', 
        	'email'=>'burki@adminAAA.com',
        	'password' => Hash::make('12345678'),
            'hak_akses' => 'Admin'],
        	['id' => 2,
            'name' => 'prabowo', 
        	'email'=>'prabowo@adminAAA.com',
        	'password' => Hash::make('12345678'),
            'hak_akses' => 'Admin'],
            ['id' => 3,
            'name' => 'kevin', 
            'email'=>'kevin@agentAAA.com',
            'password' => Hash::make('12345678'),
            'hak_akses' => 'Agent'],
            ['id' => 4,
            'name' => 'evin',
            'email'=>'evin@agentAAA.com',
            'password' => Hash::make('12345678'),
            'hak_akses' => 'Agent'],
            ['id' => 5,
            'name' => 'sonny', 
            'email'=>'sonny@agentAAA.com',
            'password' => Hash::make('12345678'),
            'hak_akses' => 'Agent'],
            ['id' => 6,
            'name' => 'billie', 
            'email'=>'billie@agentAAA.com',
            'password' => Hash::make('12345678'),
            'hak_akses' => 'Agent'],
            );
        DB::table('users')->insert($penggunas);
    }
}
