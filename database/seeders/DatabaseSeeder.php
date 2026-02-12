<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Utilisateur admin de test
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Admin Tamriel',
                'password' => Hash::make('fromage123'),
                'is_admin' => true,
            ]
        );

        // Utilisateur joueur de test (non admin)
        User::updateOrCreate(
            ['email' => 'joueur@example.com'],
            [
                'name' => 'Aventurier Nordique',
                'password' => Hash::make('fromage123'),
                'is_admin' => false,
            ]
        );

        // Seeders catalogue (données fixes, sans factory)
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
