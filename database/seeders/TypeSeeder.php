<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'name' => 'Matic',
            'color' => '#fee2e2',
        ]);
        Type::create([
            'name' => 'Bebek',
            'color' => '#dcfce7',
        ]);
        Type::create([
            'name' => 'CBR',
            'color' => '#10b981',
        ]);
        Type::create([
            'name' => 'Lainnya',
            'color' => '#facc15',
        ]);
    }
}
