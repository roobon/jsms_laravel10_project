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
                'company_name' => "SQUARE TOILETRIES",
                'company_address' => $faker->address,
                'contact_person' => $faker->name,
                'contact_number' => random_int(170000000000, 179900000000),
                'contact_email' => fake()->unique()->safeEmail(),
                'website' => 'https://www.' . Str::random(5) . '.com',
                'status' => 'active',
            ]
        );
        DB::table('companies')->insert(
            [
                'company_name' => "NEWZEALAND DAIRY",
                'company_address' => $faker->address,
                'contact_person' => $faker->name,
                'contact_number' => random_int(170000000000, 179900000000),
                'contact_email' => fake()->unique()->safeEmail(),
                'website' => 'https://www.' . Str::random(5) . '.com',
                'status' => 'active',
            ]
        );    
    }
}
