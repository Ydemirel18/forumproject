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
        $faker = Faker\factory::create();
        for ($i=0;$i<100;$i++)
        {
            DB::table('articles')->insert([
                'content_title' => $faker->title,
                'content_description'=>$faker->text(200),
                'content' => $faker->text(1000),
                'user_id' => 1,
            ]);
        }
    }
}
