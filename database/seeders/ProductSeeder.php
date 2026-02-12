<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $categories = Category::query()->pluck('id', 'slug');
        $categoryImages = [
            'armes' => 'products/tes-weapon.svg',
            'armures' => 'products/tes-armor.svg',
            'alchimie' => 'products/tes-alchemy.svg',
            'artefacts' => 'products/tes-artifact.svg',
            'magie' => 'products/tes-magic.svg',
        ];

        $products = [
            [
                'name' => 'Épée d\'acier impériale',
                'slug' => 'epee-acier-imperiale',
                'description' => 'Lame équilibrée des légions impériales, fiable en toute campagne.',
                'price' => 149.00,
                'stock' => 18,
                'active' => true,
                'category_slug' => 'armes',
            ],
            [
                'name' => 'Dague daedrique rituelle',
                'slug' => 'dague-daedrique-rituelle',
                'description' => 'Arme sombre prisée des assassins, tranchant redoutable.',
                'price' => 359.00,
                'stock' => 6,
                'active' => true,
                'category_slug' => 'armes',
            ],
            [
                'name' => 'Arc de verre de Val-boisé',
                'slug' => 'arc-verre-val-boise',
                'description' => 'Arc léger d\'artisanat altmer, précis à longue distance.',
                'price' => 289.00,
                'stock' => 9,
                'active' => true,
                'category_slug' => 'armes',
            ],
            [
                'name' => 'Hache nordique gravée',
                'slug' => 'hache-nordique-gravee',
                'description' => 'Forgée pour le combat rapproché, emblème des guerriers nordiques.',
                'price' => 199.00,
                'stock' => 11,
                'active' => true,
                'category_slug' => 'armes',
            ],
            [
                'name' => 'Cuirasse en ébonite',
                'slug' => 'cuirasse-ebonite',
                'description' => 'Armure lourde d\'élite, excellente protection contre les coups brutaux.',
                'price' => 420.00,
                'stock' => 5,
                'active' => true,
                'category_slug' => 'armures',
            ],
            [
                'name' => 'Casque daedrique',
                'slug' => 'casque-daedrique',
                'description' => 'Heaume intimidant et très résistant, rare sur les marchés.',
                'price' => 330.00,
                'stock' => 4,
                'active' => true,
                'category_slug' => 'armures',
            ],
            [
                'name' => 'Bouclier dwemer renforcé',
                'slug' => 'bouclier-dwemer-renforce',
                'description' => 'Ingénierie dwemer robuste, idéal pour tenir la ligne.',
                'price' => 245.00,
                'stock' => 8,
                'active' => true,
                'category_slug' => 'armures',
            ],
            [
                'name' => 'Bottes de la Confrérie noire',
                'slug' => 'bottes-confrerie-noire',
                'description' => 'Bottes discrètes offrant mobilité et silence en infiltration.',
                'price' => 175.00,
                'stock' => 10,
                'active' => true,
                'category_slug' => 'armures',
            ],
            [
                'name' => 'Potion de soins majeure',
                'slug' => 'potion-soins-majeure',
                'description' => 'Restaure rapidement la vitalité au cœur des batailles.',
                'price' => 45.00,
                'stock' => 60,
                'active' => true,
                'category_slug' => 'alchimie',
            ],
            [
                'name' => 'Potion de vigueur du guerrier',
                'slug' => 'potion-vigueur-guerrier',
                'description' => 'Redonne de l\'endurance pour prolonger les affrontements.',
                'price' => 39.00,
                'stock' => 52,
                'active' => true,
                'category_slug' => 'alchimie',
            ],
            [
                'name' => 'Élixir de résistance au feu',
                'slug' => 'elixir-resistance-feu',
                'description' => 'Utile contre les dragons et mages pyromanciens.',
                'price' => 58.00,
                'stock' => 34,
                'active' => true,
                'category_slug' => 'alchimie',
            ],
            [
                'name' => 'Sel de feu raffiné',
                'slug' => 'sel-feu-raffine',
                'description' => 'Ingrédient alchimique de haute qualité pour concoctions avancées.',
                'price' => 28.00,
                'stock' => 80,
                'active' => true,
                'category_slug' => 'alchimie',
            ],
            [
                'name' => 'Amulette de Mara',
                'slug' => 'amulette-mara',
                'description' => 'Artefact sacré recherché pour ses bénédictions protectrices.',
                'price' => 210.00,
                'stock' => 7,
                'active' => true,
                'category_slug' => 'artefacts',
            ],
            [
                'name' => 'Gemme spirituelle grand format',
                'slug' => 'gemme-spirituelle-grand-format',
                'description' => 'Capte les âmes puissantes pour recharger les enchantements.',
                'price' => 125.00,
                'stock' => 23,
                'active' => true,
                'category_slug' => 'artefacts',
            ],
            [
                'name' => 'Anneau de Barenziah (réplique)',
                'slug' => 'anneau-barenziah-replique',
                'description' => 'Réplique luxueuse inspirée des joyaux de la reine légendaire.',
                'price' => 275.00,
                'stock' => 3,
                'active' => true,
                'category_slug' => 'artefacts',
            ],
            [
                'name' => 'Pierre de Welkynd intacte',
                'slug' => 'pierre-welkynd-intacte',
                'description' => 'Cristal ayléide convoité pour sa réserve d\'énergie magique.',
                'price' => 165.00,
                'stock' => 14,
                'active' => true,
                'category_slug' => 'artefacts',
            ],
            [
                'name' => 'Tome : Boule de feu experte',
                'slug' => 'tome-boule-de-feu-experte',
                'description' => 'Manuel d\'incantation destiné aux mages confirmés.',
                'price' => 190.00,
                'stock' => 12,
                'active' => true,
                'category_slug' => 'magie',
            ],
            [
                'name' => 'Parchemin d\'éclair en chaîne',
                'slug' => 'parchemin-eclair-chaine',
                'description' => 'Libère une décharge foudroyante rebondissant entre les ennemis.',
                'price' => 86.00,
                'stock' => 21,
                'active' => true,
                'category_slug' => 'magie',
            ],
            [
                'name' => 'Sceptre du givre ancestral',
                'slug' => 'sceptre-givre-ancestral',
                'description' => 'Canalise une magie glaciale puissante contre les créatures hostiles.',
                'price' => 320.00,
                'stock' => 5,
                'active' => true,
                'category_slug' => 'magie',
            ],
            [
                'name' => 'Grimoire d\'enchantement novice',
                'slug' => 'grimoire-enchantement-novice',
                'description' => 'Guide pratique pour apposer les premiers enchantements utilitaires.',
                'price' => 72.00,
                'stock' => 30,
                'active' => true,
                'category_slug' => 'magie',
            ],
        ];

        DB::table('order_items')->delete();
        DB::table('orders')->delete();
        Product::query()->delete();

        foreach ($products as $item) {
            $categoryId = $categories[$item['category_slug']] ?? null;

            if (!$categoryId) {
                continue;
            }

            Product::create([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'image' => $categoryImages[$item['category_slug']] ?? null,
                'description' => $item['description'],
                'price' => $item['price'],
                'stock' => $item['stock'],
                'active' => $item['active'],
                'category_id' => $categoryId,
            ]);
        }
    }
}
