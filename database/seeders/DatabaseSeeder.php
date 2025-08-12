<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (User::count() === 0) {

            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('123456789'),
            ]);
            User::factory(10)->create();

        }

        if (Clinic::count() === 0) {
            Clinic::create([
                'name' => 'Test Clinic',
                'address' => '123 Test St, Test City',
                'phone' => '123-456-7890',
            ]);
        }

        User::where('id', 1)->first()->clinics()->attach(Clinic::first());
    }
}
