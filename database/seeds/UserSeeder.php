<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Herman',
            'email' => 'hsfnelissen@gmail.com',
            'password' => bcrypt('secret'),
            'admin' => true,
        ]);
    }
}
