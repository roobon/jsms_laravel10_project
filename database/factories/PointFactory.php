<?php

namespace Database\Factories;

use App\Models\Point;



use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point>
 */
class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Point::class;

    public function definition(): array
    {
        return [
            'point_name' => fake()->name(),
            'point_address' => fake()->address(),
            'opening_date' => $this->faker->dateTimeBetween('-1 year', 'now')
        ];
    }
}
