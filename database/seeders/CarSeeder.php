<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'brand' => 'Honda',
                'model' => 'Brio',
                'license_plate' => 'T 3308 AU',
                'daily_rate' => 150000,
                'file' => 'file/assetsLanding/img/logo.png',
            ],
            [
                'brand' => 'Daihatsu',
                'model' => 'Ayla',
                'license_plate' => 'D 1508 AU',
                'daily_rate' => 150000,
                'file' => 'file/assetsLanding/img/logo.png',
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Calya',
                'license_plate' => 'D 3308 RTU',
                'daily_rate' => 150000,
                'file' => 'file/assetsLanding/img/logo.png',
            ],
        ];

        foreach ($data as $carData) {
            Car::create($carData);
        }
    }
}
