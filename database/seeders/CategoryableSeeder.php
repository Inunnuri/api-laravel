<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for($i=1; $i<=10 ; $i++){
        //     $task = Task::find($i);
        //     if ($task){
        //        // Mengaitkan kategori dengan ID 1 hingga 10
        //        foreach (range(1, 10) as $categoryId){
        //         $task->categories()->attach($categoryId,[
        //             'categoryable_id' => $task->id,
        //             'categoryable_type' => Task::class,
        //         ]);
        //        }
        //        Log::info("Kategori $categoryId telah ditambahkan ke task ID $task->id");
        //     } else {
        //         Log::warning("Task dengan ID $i tidak ditemukan");
        //     }
        // }
    }
}
