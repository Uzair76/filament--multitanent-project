<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'doctor']);
        // $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        // $studentRole = Role::firstOrCreate(['name' => 'student']);

        // Create Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('123456789')
            ]
        );
        $admin->assignRole($adminRole);

        // Create Teacher User
        // $teacher = User::firstOrCreate(
        //     ['email' => 'teacher@example.com'],
        //     [
        //         'name' => 'Teacher User',
        //         'password' => Hash::make('password')
        //     ]
        // );
        // $teacher->assignRole($teacherRole);

        // // Create Student User
        // $student = User::firstOrCreate(
        //     ['email' => 'student@example.com'],
        //     [
        //         'name' => 'Student User',
        //         'password' => Hash::make('password')
        //     ]
        // );
        // $student->assignRole($studentRole);
    }
}
