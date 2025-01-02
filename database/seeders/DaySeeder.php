<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
