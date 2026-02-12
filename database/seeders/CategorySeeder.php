<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
            ['name' => 'Armes', 'description' => 'Lames, arcs et armes légendaires de Tamriel'],
            ['name' => 'Armures', 'description' => 'Équipements défensifs forgés par les meilleures guildes'],
            ['name' => 'Alchimie', 'description' => 'Potions, ingrédients rares et mélanges mystiques'],
            ['name' => 'Artefacts', 'description' => 'Objets enchantés, reliques daedriques et trésors anciens'],
            ['name' => 'Magie', 'description' => 'Tomes, parchemins et catalyseurs pour mages aventureux'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                ]
            );
        }
    }
}
