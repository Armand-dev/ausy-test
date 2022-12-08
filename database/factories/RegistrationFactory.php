<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registration>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_name' => $this->faker->name,
            'email' => $this->faker->email,
            'kids' => rand(0, 3),
            'vegeterians' => rand(0, 1),
            'plus_one' => rand(0, 1),
            'department' => $this->faker->randomElement(config('departments')),
        ];
    }
}
