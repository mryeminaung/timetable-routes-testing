<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ["title" => "Professor", "description" => "Senior academic leader specializing in specific fields."],
            ["title" => "Associate Professor", "description" => "Mid-level academic role with research and teaching responsibilities."],
            ["title" => "Assistant Professor", "description" => "Early-career academic focusing on teaching and research."],
            ["title" => "Lecturer", "description" => "Responsible for delivering lectures and guiding students."],
            ["title" => "Teaching Assistant", "description" => "Supports lecturers in teaching and grading."],
            ["title" => "Research Fellow", "description" => "Engaged in advanced research projects."],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
