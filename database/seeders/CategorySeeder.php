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
        $categoriesForTasks = [
            ['name' => 'Sunnah',
            'color' => '#dbeafe'],
            ['name' => 'Wajib',
            'color' => '#fee2e2'],
            ['name' => 'Work',
            'color' => '#dcfce7'],
            ['name' => 'Study',
            'color' => '#fef9c3'],
            ['name' => 'Health',
            'color' => '#e0e7ff'],
            ['name' => 'Finance',
            'color' => '#cffafe'],
            ['name' => 'Shopping',
            'color' => '#ffedd5'],
            ['name' => 'Travel',
            'color' => '#f3e8ff'],
            ['name' => 'Personal',
            'color' => '#ccfbf1'],
            ['name' => 'other',
            'color' => '#f3f4f6']
        ];

        // Kategori untuk Products
        $categoriesForProducts = [
            ['name' => 'Sale', 'color' => '#ccffcc'],
            ['name' => 'New Arrivals', 'color' => '#ccffff'],
        ];
        
        foreach ($categoriesForTasks as $category) {
            Category::create($category);
        }

        foreach ($categoriesForProducts as $category) {
            Category::create($category);
        }
    }
}
