<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $faker = Faker::create();
          foreach (range(1, 100) as $index) {
              DB::table('customers')->insert([
                  'user_id'           => 1,
                  'customer_id'       => $faker->unixTime($max = 'now'),
                  'customer_name'     => $faker->name,
                  'customer_email'    => $faker->email,
                  'customer_phone'    => $faker->phoneNumber,
                  'customer_location' => $faker->secondaryAddress,
                  'customer_zip'      => $faker->postcode,
                  'customer_city'     => $faker->city,
                  'customer_country'  => $faker->country,
              ]);
          }
    }
}
