<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category) // Route Model Binding automatique
    {
        // On charge les produits de CETTE catégorie avec pagination (ex: 9 par page)
        // Pas besoin de "with()" ici car on part déjà de la catégorie chargée
        $products = $category->products()->paginate(9);

        return view('categories.show', compact('category', 'products'));
    }
}
