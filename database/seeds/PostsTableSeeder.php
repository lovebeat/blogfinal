<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //clear data 
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('posts')->truncate();
        $faker = Factory::create();
        $posts = [];
        $date = Carbon::create(2018, 9, 18, 9);
        
        /// insert 10 dummy data
        for($i=0; $i<10; $i++){
            $image = 'Post_Image_'.rand(1,5).'.jpg';
            $date->addDay();
            $publishedDate = clone ($date);
            $posts[] = [//funny way to put data to array in php :D

                'author_id' => rand(1,3),
                'title' => $faker->sentence(rand(8,12)),
                'excerpt' => $faker->text(rand(250,300)),
                'body' => $faker->paragraphs(rand(10,15), true),
                'slug' => $faker->slug,
                'image' => (rand(0,1) == 1) ? $image : NULL,
                'created_at' => clone ($date),
                'updated_at' => clone ($date),
                'published_at' => $i<5 ? $publishedDate : (rand(0,1)==0 ? NULL : $publishedDate->addDays(4)),
            ];

        }
        DB::table('posts')->insert($posts);
    }
}
