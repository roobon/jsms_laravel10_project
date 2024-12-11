<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'admin_id' => random_int(1, 20),
            'name' => $this->faker->name,
            'designation' => $this->faker->title,
            'address' => $this->faker->address,
            'dob' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'joining_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'contact_number' =>  random_int(170000000000, 179900000000),
            'photo' => 'images/employee/noempphoto.jpg',
            'nid' => Str::random(10),
            'resume' => $this->faker->sentence,
            'status' => 'active',
        ];
    }
}