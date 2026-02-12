<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // avant j'ai fait l'equivalent de "SELECT * FROM products"
        // $products = Product::all(); 

        $products = Product::with('category')->get(); // APRES (Eager Loading) 

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:products,slug'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'description' => ['nullable', 'string'],
            'active' => ['sometimes', 'boolean'],
        ]);

        $validated['active'] = $request->boolean('active');

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produit créé.');
    }


    /**
     * Store a newly created resource in storage.
     */
 //   public function store(Request $request)
 //   {
   //     Product::create([
   //         'name' => $request->name,
  //          'description' => $request->description,
  //          'price' => $request->price,
  //          'stock' => $request->stock,
 //           'category_id' => $request->category_id,
 //           'active' => $request->has('active') ? 1 : 0, // Gère la checkbox
 //       ]);
 //       return redirect()->route('products.index')
 //           ->with('success', 'Produit créé avec succès !');
 //   }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('products', 'slug')->ignore($product->id)],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'description' => ['nullable', 'string'],
            'active' => ['sometimes', 'boolean'],
        ]);

        $validated['active'] = $request->boolean('active');

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produit modifié avec succès !');
    }
}
