<?php

namespace Database\Factories;

use App\Models\Sales;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Sales::class;

    public function definition(): array
    {
        return [
            'retailer_id' =>  random_int(1, 20),
            'invoice_number' => Str::random(20),
            'total_amount' =>  random_int(5000, 10000),
            'collection_amount' =>  random_int(5000, 10000),
            'due_amount' =>  random_int(2000, 5000),
            'due_realization' =>  random_int(5000, 10000),
            'employee_id' => random_int(1, 10),
            'point_id' => random_int(1, 10),
            'sales_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'voucher_photo' => 'images/sales/no_voucherhoto.jpg',
        ];
    }
}
