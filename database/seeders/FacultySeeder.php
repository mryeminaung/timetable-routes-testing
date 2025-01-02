<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Faculty::factory(10)->create();
        $data = [];
        $hashedPassword = bcrypt('password');
        // Define male and female name components
        $maleNames = ['Aung', 'Kyaw', 'Min', 'Tun', 'Soe', 'Naing'];
        $femaleNames = ['Moe', 'May', 'Hnin', 'Yin', 'Nwe', 'Thiri'];

        for ($faculty = 1; $faculty <= 100; $faculty++) {

            // Even rolls: Male, Odd rolls: Female
            $isMale = $faculty % 2 == 0;

            // Determine gender and create a name with up to three parts
            $name = $isMale
                ? $this->generateName($maleNames, 'U')
                : $this->generateName($femaleNames, 'Daw');

            $username = strtolower(implode('-', array_slice(explode(' ', $name), 1)));

            $email = "{$username}@miit.edu.mm";

            $data[] = [
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword,
                'gender' => $isMale ? 'Male' : 'Female',
                'phone_number' => fake()->phoneNumber(),
                'role_id' => fake()->numberBetween(1, Role::count()),
                'department_id' => fake()->numberBetween(1, Department::count()),
                'created_at' => now(),
            ];
        }
        Faculty::insert($data);
    }

    /**
     * Generate a three-part name with a prefix.
     *
     * @param array $nameParts
     * @param string $prefix
     * @return string
     */
    private function generateName(array $nameParts, string $prefix): string
    {
        shuffle($nameParts); // Randomize name parts
        $selectedParts = array_slice($nameParts, 0, rand(2, 3)); // Choose 2-3 parts
        return $prefix . ' ' . implode(' ', $selectedParts); // Combine with prefix
    }
}
