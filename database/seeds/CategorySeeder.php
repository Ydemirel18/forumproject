<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => "PHP"
        ]);
        DB::table('categories')->insert([
            'category' => "MYSQL"
        ]);
        DB::table('categories')->insert([
            'category' => "JAVASCRIPT"
        ]);
        DB::table('categories')->insert([
            'category' => "LINUX"
        ]);
        DB::table('categories')->insert([
            'category' => "GIT"
        ]);
    }
}
