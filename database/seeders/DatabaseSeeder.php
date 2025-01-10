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

        //\App\Models\Specialist::factory(50)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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
        //$this->call([CompanySeeder::class]);
        //\App\Models\Retailer::factory(20)->create();
        \App\Models\Point::factory(4)->create();
        \App\Models\Employee::factory(10)->create();
        //\App\Models\Sales::factory(10)->create();
        //\App\Models\Payment::factory(10)->create();
    }
}
