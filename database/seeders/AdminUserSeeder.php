<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'adminUser@example.com',
            'phone' => '00000000000',
            'password' => Hash::make('password'),
            'user_type' => 'admin_user',
            'status' => 'verified',
            'profile_image' => null,
        ]);

    }
}
