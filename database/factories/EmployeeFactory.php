<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'designation' => $this->faker->randomElement([
                'Manager',
                'Delivery Man',
                'Van Driver'
            ]),
            'address' => $this->faker->address,
            'dob' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'joining_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'contact_number' =>  random_int(170000000000, 179900000000),
            'contact_email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('admin123'),
            'photo' => NULL,
            'nid' => NULL,
            'resume' => NULL,
            'point_id' => random_int(1, 3),
            'company_id' => random_int(1, 4),
            'status' => 'active',
        ];
    }
}
