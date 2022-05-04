<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->command->info('Users created!');

        $this->call(TypesTableSeeder::class);
        $this->command->info('Types created!');

        $this->call(EquipmentsTableSeeder::class);
        $this->command->info('Equipments created!');
    }
}
