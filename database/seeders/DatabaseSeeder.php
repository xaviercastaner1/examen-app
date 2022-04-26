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
        $this->call(CiutatSeeder::class);
        $this->command->info('Ciutat table seeded!');

        $this->call(CasalSeeder::class);
        $this->command->info('Casal table seeded!');
    }
}
