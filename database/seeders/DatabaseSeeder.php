<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use App\Models\Course;
use App\Models\Day;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Major;
use App\Models\Program;
use App\Models\Role;
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
        // ClassRoom::factory(5)->create();

        // Program::factory(3)->create();
        // Course::factory(10)->create();

        Department::factory(5)->create();
        Role::factory(5)->create();
        Faculty::factory(10)->create();

        $days = [
            ['name' => 'Monday', 'day_code' => 'Mon'],
            ['name' => 'Tuesday', 'day_code' => 'Tue'],
            ['name' => 'Wednesday', 'day_code' => 'Wed'],
            ['name' => 'Thursday', 'day_code' => 'Thu'],
            ['name' => 'Friday', 'day_code' => 'Fri'],
            ['name' => 'Saturday', 'day_code' => 'Sat'],
            ['name' => 'Sunday', 'day_code' => 'Sun'],
        ];

        foreach ($days as $day) {
            Day::create($day);
        }
    }
}
