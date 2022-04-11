<?php

namespace Database\Seeders;

use App\Models\Sparepart;
use DateTime;
use Illuminate\Database\Seeder;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sparepart::create([
            'name' => 'Ban Bridgestone',
            'price' => 100000,
            'created_at' => new DateTime(),
        ]);
        Sparepart::create([
            'name' => 'Ban Radial',
            'price' => 150000,
            'created_at' => new DateTime(),
        ]);
        Sparepart::create([
            'name' => 'busi',
            'price' => 25000,
            'created_at' => new DateTime(),
        ]);
        Sparepart::create([
            'name' => 'shock breaker',
            'price' => 30000,
            'created_at' => new DateTime(),
        ]);
        Sparepart::create([
            'name' => 'kampas rem',
            'price' => 50000,
            'created_at' => new DateTime(),
        ]);
        Sparepart::create([
            'name' => 'Rantai',
            'price' => 90000,
            'created_at' => new DateTime(),
        ]);
        Sparepart::create([
            'name' => 'Piston',
            'price' => 300000,
            'created_at' => new DateTime(),
        ]);
        Sparepart::create([
            'name' => 'Kampas Kopling',
            'price' => 60000,
            'created_at' => new DateTime(),
        ]);
        Sparepart::create([
            'name' => 'V-belt',
            'price' => 63000,
            'created_at' => new DateTime(),
        ]);
        Sparepart::create([
            'name' => 'CDI',
            'price' => 305000,
            'created_at' => new DateTime(),
        ]);
    }
}
