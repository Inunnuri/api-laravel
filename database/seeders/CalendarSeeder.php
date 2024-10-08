<?php

namespace Database\Seeders;

use App\Models\Calendar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Calendar::create([
            'name' => 'Ibadah',
            'color' => '#dbeafe',
        ]);
        Calendar::create([
            'name' => 'Non Ibadah',
            'color' => '#ecfccb',
        ]);
    }
}
