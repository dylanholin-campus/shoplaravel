<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents; // pour éviter les événements Eloquent lors de l'insertion (gain de performance)

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Meubles', 'description' => 'Tout pour aménager votre intérieur'],
            ['name' => 'Décoration', 'description' => 'Les petits détails qui changent tout'],
            ['name' => 'Luminaire', 'description' => 'Éclairez votre espace avec style'],
            ['name' => 'Cuisine', 'description' => 'Ustensiles et accessoires pour les chefs'],
            ['name' => 'Jardin', 'description' => 'Pour profiter des beaux jours'],
        ];

        // On prépare les données pour l'insertion
        $data = [];
        $now = now(); // Récupère la date et l'heure actuelles une seule fois

        foreach ($categories as $category) {
            $data[] = [
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // insertion avec DB, c'est un Query Builder (sans passer par Eloquent).
        DB::table('categories')->insert($data);
    }
}
