<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@black.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('12345678'),
                'role' => 'superadmin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@black.com'],
            [
                'name' => 'Admin Desa',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ]
        );
    }
}
