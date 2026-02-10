<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import du modèle Product
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Afficher le panier
    public function index()
    {
        return view('cart.index'); // Vue à créer plus tard
    }

    // Ajouter un produit au panier
    public function add(Request $request, Product $product)
    {
        // Logique d'ajout à venir
        return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier !');
    }

    // Modifier la quantité d'un produit
    public function update(Request $request, Product $product)
    {
        // Logique de mise à jour à venir
        return back()->with('success', 'Quantité mise à jour.');
    }

    // Retirer un produit du panier
    public function remove(Product $product)
    {
        // Logique de suppression à venir
        return back()->with('success', 'Produit retiré.');
    }

    // Vider tout le panier
    public function clear()
    {
        // Logique pour vider le panier à venir
        return back()->with('success', 'Panier vidé.');
    }
}
