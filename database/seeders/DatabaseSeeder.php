<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use App\Models\Major;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Major::factory(3)->create();
        ClassRoom::factory(5)->create();
    }
}
