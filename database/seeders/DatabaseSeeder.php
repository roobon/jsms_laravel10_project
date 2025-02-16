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

        // \App\Models\Doctor::create(
        //     [
        //         'name' => 'Doctor Rakib',
        //         'email' => 'rakib@gmail.com',
        //         'password' => Hash::make('admin123'),
        //         'specialist_id' => '1'
        //     ]
        // );

        $this->call([CompanySeeder::class]);
        \App\Models\Retailer::factory(5)->create();
        \App\Models\Point::factory(3)->create();
        \App\Models\Employee::factory(5)->create();
        
    }
}
