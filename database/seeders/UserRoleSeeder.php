<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@example.com')->first();
        $adminRole = Role::where('name', 'admin')->first();

        if ($user && $adminRole && !$user->hasRole('admin')) {
            $user->roles()->attach($adminRole->id);
        }
    }
}
