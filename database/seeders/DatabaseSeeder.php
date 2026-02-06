<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Créer les utilisateurs
        \App\Models\User::factory(10)->create();

        // 2. Créer l'utilisateur admin de test
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 3. Lancer mon Seeder manuel pour créer les catégories
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
