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
            ["name" => "Computer Science", "dept_code" => "CS"],
            ["name" => "Computer Engineering", "dept_code" => "CE"],
            ["name" => "Software Engineering", "dept_code" => "SE"],
            ["name" => "Information Science and Technology", "dept_code" => "IST"],
            ["name" => "Data Science and Artificial Intelligence", "dept_code" => "DS & AI"],
            ["name" => "Networking and Cybersecurity", "dept_code" => "NCS"],
            ["name" => "Robotics and Automation", "dept_code" => "RA"],
            ["name" => "Electronics and Communications Engineering", "dept_code" => "ECE"],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
