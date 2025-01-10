<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;




class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('companies')->insert(
            [
                'company_name' => $faker->company,
                //'business_starts' => $faker->dateTimeBetween('-1 year', 'now'),
                //'security_money' => random_int(50000, 500000),
                'company_address' => $faker->address,
                'contact_person' => $faker->name,
                'contact_number' => random_int(170000000000, 179900000000),
                'contact_email' => fake()->unique()->safeEmail(),
                'website' => 'hpp://www.' . Str::random(5) . '.com',
                //'last_business_date' => $faker->dateTimeBetween('-1 year', 'now'),
                //'last_balance' => random_int(15000, 50000),
                'status' => 'active',
            ]
        );

        // DB::table('companies')->insert(
        //     [
        //         'company_name' => $faker->company,
        //         'business_starts' => $faker->dateTimeBetween('-1 year', 'now'),
        //         'security_money' => random_int(50000, 500000),
        //         'company_address' => $faker->address,
        //         'contact_person' => $faker->name,
        //         'contact_number' => random_int(170000000000, 179900000000),
        //         'contact_email' => fake()->unique()->safeEmail(),
        //         'website' => 'hpp://www.' . Str::random(5) . '.com',
        //         'last_business_date' => $faker->dateTimeBetween('-1 year', 'now'),
        //         'last_balance' => random_int(15000, 50000),
        //         'status' => 'active',
        //     ]
        // );
    }
}
