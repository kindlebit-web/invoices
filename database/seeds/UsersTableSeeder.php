<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $faker = Faker::create();
          DB::table('users')->insert([
              'name' => 'Jagroop Singh',
              'email' => 'jagroop@gmail.com',
              'password' => bcrypt('password'),
          ]);
    }
}
