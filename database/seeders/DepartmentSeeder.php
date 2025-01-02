<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ["name" => "Computer Science", "short_name" => "CS"],
            ["name" => "Computer Engineering", "short_name" => "CE"],
            ["name" => "Software Engineering", "short_name" => "SE"],
            ["name" => "Information Science and Technology", "short_name" => "IST"],
            ["name" => "Data Science and Artificial Intelligence", "short_name" => "DS & AI"],
            ["name" => "Networking and Cybersecurity", "short_name" => "NCS"],
            ["name" => "Robotics and Automation", "short_name" => "RA"],
            ["name" => "Electronics and Communications Engineering", "short_name" => "ECE"],
        ];
        
        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
