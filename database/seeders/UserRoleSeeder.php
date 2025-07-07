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
        // Ambil role admin dan petugas dari tabel roles
        $adminRole = Role::where('name', 'admin')->first();
        $petugasRole = Role::where('name', 'petugas')->first();
        $userRole = Role::where('name', 'user')->first();

        // Ambil user yang sudah dibuat
        $adminUser = User::where('email', 'admin@example.com')->first();
        $petugasUser = User::where('email', 'petugas@example.com')->first();
        $userUser = User::where('email', 'user@example.com')->first();

        // Pasangkan role admin ke user admin
        if ($adminUser && $adminRole && !$adminUser->hasRole('admin')) {
            $adminUser->roles()->attach($adminRole->id);
        }

        // Pasangkan role petugas ke user petugas
        if ($petugasUser && $petugasRole && !$petugasUser->hasRole('petugas')) {
            $petugasUser->roles()->attach($petugasRole->id);
        }

        // Pasangkan role user ke user user
        if ($userUser && $userRole && !$userUser->hasRole('user')) {
            $userUser->roles()->attach($userRole->id);
        }
    }
}
