<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    const NUM_ITEMS = 5;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < self::NUM_ITEMS; $i++) {

            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => 'password',
            ]);
        }
    }
}
