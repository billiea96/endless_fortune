<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(JabatansTableSeeder::class);
        $this->call(CabangsTableSeeder::class);
        $this->call(IncomesTableSeeder::class);
        $this->call(KaryawansTableSeeder::class);
    }
}
