<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'content_title' => Str::random(10),
            'content_description'=>Str::random(100),
            'content' => Str::random(200),
            'user_id' => 1,
        ]);
    }
}
