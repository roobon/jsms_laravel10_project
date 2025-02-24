<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();
        \App\Models\Admin::create([
            'name' => 'Ziaul Habib',
            'email' => 'roobon@gmail.com',
            'password' => Hash::make('admin123'),
            'status' => 'active'
        ]);
        \App\Models\Admin::create([
            'name' => 'Syed Mahbubul Habib',
            'email' => 'smahbub.bd@gmail.com',
            'password' => Hash::make('admin123'),
            'status' => 'active'
        ]);

        // For Point/Center
        \App\Models\Point::create([
            'point_name' => 'KAZIPARA CENTER',
            'point_address' => fake()->address(),
            'opening_date' => '2024-01-01'
        ]);

        \App\Models\Point::create([
            'point_name' => 'IBRAHIMPUR CENTER',
            'point_address' => fake()->address(),
            'opening_date' => '2024-01-08'
        ]);

        \App\Models\Point::create([
            'point_name' => 'KURIL CENTER',
            'point_address' => fake()->address(),
            'opening_date' => '2024-01-05'
        ]);

        
        $this->call([CompanySeeder::class]);
        \App\Models\Retailer::factory(5)->create();
        //\App\Models\Point::factory(3)->create();
        \App\Models\Employee::factory(5)->create();
        
    }
}
