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
        \App\Models\User::factory(10)->create();

        // l'utilisateur admin de test
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('fromage123'),
                'is_admin' => true,
            ]
        );

        // Lancer mon Seeder manuel pour créer les catégories
        $this->call([
            CategorySeeder::class,
        ]);

        // 4. Créer des produits pour chaque catégorie existante
        \App\Models\Category::all()->each(function ($category) {
            \App\Models\Product::factory(10)->create([
                'category_id' => $category->id
            ]);
        });
    }
}
