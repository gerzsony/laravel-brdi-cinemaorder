<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 80; $i++) {
            if (in_array($i, [35, 36])) continue;

            DB::table('orders')->insert([
                'cinema_id' => 5,
                'room_id' => 2,
                'event_id' => 165,
                'seat_id' => $i,
                'person_session' =>  Str::random(30),
                'order_date' => $faker->dateTimeThisMonth(),
                'person_name' => $faker->name,
                'person_email' => $faker->unique()->safeEmail,
                'order_status' => 'sold',
            ]);           
   
        }


    }
}
