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
            'name' =>  'S.M faysal',
            'email' => 'faysal15-271@diu.edu.bd',
            'password' => Hash::make('password'),
        ]);
    }
}
