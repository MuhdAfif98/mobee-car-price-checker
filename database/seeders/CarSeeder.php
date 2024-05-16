<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_car = [
            [
                'brand' => 'Proton',
                'year' => 2022,
                'model' => 'X50',
                'variant' => 'EXECUTIVE',
                'price' => 80000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Proton',
                'year' => 2022,
                'model' => 'X50',
                'variant' => 'PREMIUM',
                'price' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Proton',
                'year' => 2023,
                'model' => 'X50',
                'variant' => 'EXECUTIVE',
                'price' => 90000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Proton',
                'year' => 2023,
                'model' => 'X50',
                'variant' => 'PREMIUM',
                'price' => 110000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Proton',
                'year' => 2021,
                'model' => 'X70',
                'variant' => 'TGDI EXECUTIVE',
                'price' => 95000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Proton',
                'year' => 2021,
                'model' => 'X70',
                'variant' => 'TGDI PREMIUM',
                'price' => 105000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Proton',
                'year' => 2022,
                'model' => 'X70',
                'variant' => 'TGDI EXECUTIVE',
                'price' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Proton',
                'year' => 2022,
                'model' => 'X70',
                'variant' => 'TGDI PREMIUM',
                'price' => 120000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Proton',
                'year' => 2022,
                'model' => 'X70',
                'variant' => 'TGDI STANDARD',
                'price' => 110000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // perodua
            [
                'brand' => 'Perodua',
                'year' => 2021,
                'model' => 'MYVI',
                'variant' => 'AV',
                'price' => 40000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Perodua',
                'year' => 2021,
                'model' => 'MYVI',
                'variant' => 'EXTREME',
                'price' => 45000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Perodua',
                'year' => 2022,
                'model' => 'MYVI',
                'variant' => 'AV',
                'price' => 45000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Perodua',
                'year' => 2022,
                'model' => 'MYVI',
                'variant' => 'EXTREME',
                'price' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Perodua',
                'year' => 2022,
                'model' => 'AXIA',
                'variant' => 'E',
                'price' => 30000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Perodua',
                'year' => 2023,
                'model' => 'MYVI',
                'variant' => 'EXTREME',
                'price' => 55000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Perodua',
                'year' => 2023,
                'model' => 'AXIA',
                'variant' => 'E',
                'price' => 40000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Perodua',
                'year' => 2023,
                'model' => 'ALZA',
                'variant' => 'AV',
                'price' => 70000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('cars')->insert($list_car);
    }
}
