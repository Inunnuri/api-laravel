<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => 'Available',
            'color' => '#dbeafe'
        ]);
        Status::create([
            'name' => 'Sold Out',
            'color' => '#fee2e2'
        ]);
    }
}
