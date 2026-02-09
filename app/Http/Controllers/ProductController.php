<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ❌ AVANT : Faisait juste "SELECT * FROM products"
        // $products = Product::all(); 

        // ✅ APRES (Eager Loading) : Fait 2 requêtes optimisées seulement
        // 1. SELECT * FROM products
        // 2. SELECT * FROM categories WHERE id IN (1, 2, 5...)
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::select('id', 'name')->orderBy('name')->get();

        return view('products.create', compact('categories'));
    }

    public function edit(Product $product)
    {
        $categories = Category::select('id', 'name')->orderBy('name')->get();

        return view('products.edit', compact('product', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'active' => $request->has('active') ? 1 : 0, // Gère la checkbox
        ]);
        return redirect()->route('products.index')
            ->with('success', 'Produit créé avec succès !');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'active' => $request->has('active') ? 1 : 0,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produit modifié avec succès !');
    }
}
