<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category) // Route Model Binding automatique
    {
        $products = $category->products()->paginate(9);

        return view('categories.show', compact('category', 'products'));
    }
}
