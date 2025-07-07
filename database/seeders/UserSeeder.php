<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            User::create([
            'name' => 'admin',
            'username' => 'admin',
            'phone' => '123456789',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);
            User::create([
            'name' => 'petugas 1',
            'username' => 'petugas1',
            'phone' => '123456789',
            'email' => 'petugas@example.com',
            'password' => Hash::make('petugas123'),
        ]);
            User::create([
            'name' => 'user 1',
            'username' => 'user1',
            'phone' => '123456789',
            'email' => 'user@example.com',
            'password' => Hash::make('user123'),
        ]);
    }
}
