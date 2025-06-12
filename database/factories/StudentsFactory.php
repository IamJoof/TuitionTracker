<?php

namespace Database\Factories;

use App\Models\Students;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentsFactory extends Factory
{
    protected $model = Students::class;

    public function definition(): array
    {
        return [
            'lrn_number'                        =>             $this->faker->unique()->optional()->numerify('##########'),
            'student_id_number'                 =>             strtoupper('STU' . $this->faker->unique()->numerify('#####')),
            'first_name'                        =>             $this->faker->firstName,
            'middle_name'                       =>             $this->faker->optional()->firstName,
            'last_name'                         =>             $this->faker->lastName,
            'suffix'                            =>             $this->faker->optional()->suffix,
            'date_of_birth'                     =>             $this->faker->dateTimeBetween('-20 years', '-5 years')->format('Y-m-d'),
            'gender'                            =>             $this->faker->randomElement(['male', 'female']),
            'year_level'                        =>             $this->faker->randomElement(['pre-elementary', 'elementary', 'junior_high', 'senior_high']),
            'status'                            =>             $this->faker->randomElement(['active', 'inactive', 'graduated']),
            'contact_number'                    =>             $this->faker->optional()->numerify('09#########'),
            'is_discounted'                     =>             $this->faker->boolean,
            'address'                           =>             $this->faker->optional()->address,
            'created_by_user_id'                =>             null, 
            'current_academic_year_id'          =>             null, 
        ];
    }
}
