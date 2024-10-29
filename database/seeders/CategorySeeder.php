<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Second',
            'color' => '#fee2e2'
        ]);
        Category::create([
            'name' => 'New',
            'color' => '#dbeafe'
        ]);
        
    }
}
