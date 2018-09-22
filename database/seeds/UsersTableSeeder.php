<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset table data;
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        //generate 3 user authors;
        DB::table('users')->insert([
            [
                'name' => "Thach Huynh",
                'email' => 'lovebeat0124@gmail.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => "Jane Huynh",
                'email' => 'jane@gmail.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => "Edo Masaru",
                'email' => 'edomasaru@gmail.com',
                'password' => bcrypt('secret')
            ],
        ]);


    }
}
