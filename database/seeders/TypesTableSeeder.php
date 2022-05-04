<?php

namespace Database\Seeders;

use App\Enums\TypeMaskEnum;
use App\Models\Type;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    const NUM_ITEMS = 3;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < self::NUM_ITEMS; $i++) {
            Type::create([
                'name' => $faker->name,
                'mask' => $i+1,
            ]);
        }
        //
    }
}
