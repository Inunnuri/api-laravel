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
            'name' => 'Plan',
            'color' => '#fee2e2'
        ]);
        Status::create([
            'name' => 'Progress',
            'color' => '#dbeafe'
        ]);
        Status::create([
            'name' => 'Completed',
            'color' => '#cffafe'
        ]);
    }
}
