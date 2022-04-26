<?php

namespace Database\Seeders;

use App\Models\Casal;
use App\Models\Ciutat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CasalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciutats = Ciutat::all()->pluck('id');

        Casal::create([
            'nom' => 'Olla de Grills',
            'data_inici' => '2022-06-22',
            'data_final' => '2022-08-05',
            'n_places' => 150,
            'ciutat' => $ciutats[rand(0, count($ciutats) - 1)]
        ]);

        Casal::create([
            'nom' => 'Sant Josep',
            'data_inici' => '2022-06-24',
            'data_final' => '2022-08-06',
            'n_places' => 200,
            'ciutat' => $ciutats[rand(0, count($ciutats) - 1)]
        ]);

        Casal::create([
            'nom' => 'Casal Sant Gervasi',
            'data_inici' => '2022-05-28',
            'data_final' => '2022-08-01',
            'n_places' => 150,
            'ciutat' => $ciutats[rand(0, count($ciutats) - 1)]
        ]);

        Casal::create([
            'nom' => 'Casal d\'estiu Badalona',
            'data_inici' => '2022-06-16',
            'data_final' => '2022-07-26',
            'n_places' => 250,
            'ciutat' => $ciutats[rand(0, count($ciutats) - 1)]
        ]);

        Casal::create([
            'nom' => 'Les Termes',
            'data_inici' => '2022-06-01',
            'data_final' => '2022-08-01',
            'n_places' => 175,
            'ciutat' => $ciutats[rand(0, count($ciutats) - 1)]
        ]);
    }
}
