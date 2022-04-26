<?php

namespace Database\Seeders;

use App\Models\Ciutat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CiutatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciutat::create([
            'nom' => 'Mataró',
            'n_habitants' => 120000
        ]);

        Ciutat::create([
            'nom' => 'Arenys de Mar',
            'n_habitants' => 45000
        ]);

        Ciutat::create([
            'nom' => 'Badalona',
            'n_habitants' => 140000
        ]);

        Ciutat::create([
            'nom' => 'Sabadell',
            'n_habitants' => 130000
        ]);
    }
}
