<?php

namespace Database\Seeders;

use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Task::truncate();

        for ($i = 1; $i <= 5; $i++) {
            Task::create([
                'name' => "Task $i",
                'description' => "Task description $i",
            ]);
        }
    }
}
