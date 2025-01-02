<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($roomNo = 200; $roomNo <= 210; $roomNo++) {
            $classRoomName = 'Room ' . $roomNo;

            ClassRoom::create([
                'name' => $classRoomName,
                'capacity' => fake()->randomElement([60, 120])
            ]);
        }
    }
}
