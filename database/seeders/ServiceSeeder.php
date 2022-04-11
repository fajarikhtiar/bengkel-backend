<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use DateTime;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' => 'Tune up',
            'price' => 100000,
            'created_at' => new DateTime(),
        ]);
        Service::create([
            'name' => 'Ketok Magic',
            'price' => 150000,
            'created_at' => new DateTime(),
        ]);
        Service::create([
            'name' => 'Service 5000KM',
            'price' => 25000,
            'created_at' => new DateTime(),
        ]);
        Service::create([
            'name' => 'Cuci',
            'price' => 30000,
            'created_at' => new DateTime(),
        ]);
        Service::create([
            'name' => 'Repaint',
            'price' => 50000,
            'created_at' => new DateTime(),
        ]);
    }
}
