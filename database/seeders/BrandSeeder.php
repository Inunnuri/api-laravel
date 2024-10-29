<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'name' => 'Honda',
            'color' => '#fee2e2',
        ]);
        Brand::create([
            'name' => 'Yamaha',
            'color' => '#dbeafe',
        ]);
        Brand::create([
            'name' => 'Suzuki',
            'color' => '#10b981',
        ]);
        Brand::create([
            'name' => 'Lainnya',
            'color' => '#facc15',
        ]);
    }
}
