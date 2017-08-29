<?php

use Illuminate\Database\Seeder;

class posttable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 20; $i++){
            $faker = \Faker\Factory::create();
           $post = new App\Post();
           $post->title = $faker->realText(20);
           $post->user_id = rand(1,5);
           $post->content = $faker->realText();
           $post->save();
        }
    }
}
