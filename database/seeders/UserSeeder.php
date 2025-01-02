<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define years, departments, and roll numbers
        $years = ['2015', '2016', '2017', '2018', '2019', '2021', '2022', '2023', '2024'];
        $majors = ['cse', 'ece'];

        $rollNumbers = range(1, 60); // 001 to 060
        $data = [];
        $hashedPassword = bcrypt('password');
        // Define male and female name components
        $maleNames = ['Aung', 'Kyaw', 'Min', 'Tun', 'Soe', 'Naing'];
        $femaleNames = ['Moe', 'May', 'Hnin', 'Yin', 'Nwe', 'Thiri'];

        foreach ($years as $year) {
            foreach ($majors as $major) {
                foreach ($rollNumbers as $rollNumber) {
                    $formattedRoll = str_pad($rollNumber, 3, '0', STR_PAD_LEFT); // Format as 001, 002, ...
                    $email = "{$year}-{$major}-{$formattedRoll}@miit.edu.mm";

                    // Even rolls: Male, Odd rolls: Female
                    $isMale = $rollNumber % 2 == 0;

                    // Determine gender and create a name with up to three parts
                    $nameComponents = $isMale
                        ? $this->generateName($maleNames, 'Mg')
                        : $this->generateName($femaleNames, 'Ma');

                    $data[] = [
                        'name' => $nameComponents,
                        'password' => $hashedPassword,
                        'email' => $email,
                        'gender' => $isMale ? 'Male' : 'Female',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }
        User::insert($data);
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
