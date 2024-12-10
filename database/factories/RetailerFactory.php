<?php

namespace Database\Factories;

use App\Models\Retailer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Retailer>
 */
class RetailerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Retailer::class;

    public function definition(): array
    {
        return [
            'shop_name' => $this->faker->company,
            'proprietor_name' => $this->faker->name,
            'shop_address' => $this->faker->address,
            'trade_lisence' =>  Str::random(10),
            'contact_person' => $this->faker->name,
            'contact_number' =>  random_int(170000000000, 179900000000),
            'contact_email' => fake()->unique()->safeEmail(),
            'business_starts' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'last_business' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'last_balance' => random_int(50000, 100000),
            'status' => 'active',
        ];
    }
}
