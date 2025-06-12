<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleAndUserSeeder extends Seeder
{
    public function run(): void
    {
        // Rollen aanmaken
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $techRole = Role::firstOrCreate(['name' => 'technieker']);

        // Admin gebruiker
        $admin = User::firstOrCreate(
            ['email' => 'admin@aquafin.be'],
            [
                'name' => 'Admin Gebruiker',
                'password' => Hash::make('admin123'),
            ]
        );
        $admin->assignRole($adminRole);

        // Technieker gebruiker
        $tech = User::firstOrCreate(
            ['email' => 'tech@aquafin.be'],
            [
                'name' => 'Technieker Gebruiker',
                'password' => Hash::make('tech123'),
            ]
        );
        $tech->assignRole($techRole);
    }
}
