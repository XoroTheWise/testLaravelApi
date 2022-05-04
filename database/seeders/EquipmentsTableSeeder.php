<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Type;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class EquipmentsTableSeeder extends Seeder
{
    const NUM_ITEMS = 10;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < self::NUM_ITEMS; $i++) {
            Equipment::create([
                'type_id' => Type::inRandomOrder()->first()->id,
                'number' => 'AAAAAAAAAA',
                'note' => $faker->text(20),
            ]);
        }
    }
}
