<?php

namespace Database\Seeders;

use App\Models\Accesorie;
use DateTime;
use Illuminate\Database\Seeder;

class AccesorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accesorie::create([
            'name' => 'Klakson telolet',
            'price' => 100000,
            'created_at' => new DateTime(),
        ]);
        Accesorie::create([
            'name' => 'spion',
            'price' => 150000,
            'created_at' => new DateTime(),
        ]);
        Accesorie::create([
            'name' => 'Jok',
            'price' => 25000,
            'created_at' => new DateTime(),
        ]);
        Accesorie::create([
            'name' => 'Bohlam LED',
            'price' => 30000,
            'created_at' => new DateTime(),
        ]);
        Accesorie::create([
            'name' => 'Handle rem',
            'price' => 50000,
            'created_at' => new DateTime(),
        ]);
        Accesorie::create([
            'name' => 'Stiker',
            'price' => 90000,
            'created_at' => new DateTime(),
        ]);
        Accesorie::create([
            'name' => 'Pelindung Tangan',
            'price' => 300000,
            'created_at' => new DateTime(),
        ]);
        Accesorie::create([
            'name' => 'List Body',
            'price' => 60000,
            'created_at' => new DateTime(),
        ]);
        Accesorie::create([
            'name' => 'Tutup Pentil',
            'price' => 5000,
            'created_at' => new DateTime(),
        ]);
        Accesorie::create([
            'name' => 'Baut Warna',
            'price' => 1000,
            'created_at' => new DateTime(),
        ]);
    }
}
