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
        $data = [];
        $hashedPassword = bcrypt('password');

        for ($faculty = 1; $faculty <= 100; $faculty++) {

            // Define male and female name components
            $maleNames = ['Aung', 'Kyaw', 'Min', 'Tun', 'Soe', 'Naing'];
            $femaleNames = ['Moe', 'May', 'Hnin', 'Yin', 'Nwe', 'Thiri'];

            // Even rolls: Male, Odd rolls: Female
            $isMale = $faculty % 2 == 0;

            $phoneNo = $this->generatePhoneNo();

            // Determine gender and create a name with up to three parts
            $name = $isMale
                ? $this->generateName($maleNames, 'U')
                : $this->generateName($femaleNames, 'Daw');

            $email = $this->generateEmail($faculty, $name);

            $data[] = [
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword,
                'gender' => $isMale ? 'Male' : 'Female',
                'phone_number' => $phoneNo,
                'role_id' => fake()->numberBetween(1, Role::count()),
                'department_id' => fake()->numberBetween(1, Department::count()),
                'created_at' => now(),
            ];
        }
        Faculty::insert($data);
    }

    /**
     * Generate an email address based on the faculty's name.
     *
     * @param string $faculty
     * @param string $name
     * @return string
     */
    private function generateEmail(string $faculty, string $name)
    {
        $username = strtolower(implode('-', array_slice(explode(' ', $name), 1)));
        $email = "{$username}@miit.edu.mm";
        return $email;
    }

    /**
     * Generate a Myanmar phone number with a random operator.
     *
     * @return string
     */
    private function generatePhoneNo(): string
    {
        $operators = [
            'Telenor' => ['7', '8'], // Example Telenor prefixes
            'Ooredoo' => ['9', '5'], // Example Ooredoo prefixes
            'MPT'     => ['6', '4'], // Example MPT prefixes
        ];

        // Randomly select an operator
        $operator = array_rand($operators);

        // Get a random prefix for the selected operator
        $prefix = fake()->randomElement($operators[$operator]);

        // Generate a random 8-digit subscriber numbe
        $subscriberNumber = fake()->numberBetween(10000000, 99999999);

        // Combine to form the phone number
        $phoneNumber = "+959 " . $prefix . $subscriberNumber;

        return $phoneNumber;
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
