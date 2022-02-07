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
            'name' => Str::random(10),
            'email' => 'ydemirel1964@gmail.com',
            'password' => Hash::make('Ydemirel18.'),
        ]);
    }
}
