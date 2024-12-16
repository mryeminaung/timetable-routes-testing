<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faculty>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone_number' => $this->faker->phoneNumber(),
            'role_id' => $this->faker->numberBetween(1, Role::count()),
            'department_id' => $this->faker->numberBetween(1, Department::count()),
        ];
    }
}
