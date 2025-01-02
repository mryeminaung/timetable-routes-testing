<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            [
                'name' => 'CSE',
                'description' => 'Computer Science and Engineering focuses on the study of computer systems, software development, algorithms, and data structures.'
            ],
            [
                'name' => 'ECE',
                'description' => 'Electronics and Communication Engineering deals with the design and development of electronic circuits, communication systems, and signal processing.'
            ]
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}
