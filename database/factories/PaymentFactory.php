<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'transfer_method' =>  'banktransfer',
            'cheque_voucher' => Str::random(20),
            'payment_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'payment_amount' =>  random_int(5000, 10000),
            'point_id' => random_int(1, 4),
            'company_id' => random_int(1, 4),
            'employee_id' => random_int(1, 20),
            'payment_note' =>  Str::random(20),
            'cheque_voucher_photo' => 'images/nohoto.jpg',
        ];
    }
}
