<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lrnNumber'     => fake()->unique()->randomNumber(9),

            'student_id'    => fake()->unique()->randomNumber(6),

            'firstName'     => fake()->firstName(),

            'lastName'      => fake()->lastName(),

            'middleName'    => fake()->lastName(),

            'suffix'        => fake()->randomElement(['Jr.', 'Sr.', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X']),

            'gender'        => fake()->randomElement(['male', 'female']),

            'contactNumber' => fake()->regexify('09[0-9]{2}-[0-9]{3}-[0-9]{4}'),

            'yearLevel'     => fake()->randomElement(['preSchool', 'elementary','juniorHighSchool','seniorHighSchool']),
        ];
    }
}
