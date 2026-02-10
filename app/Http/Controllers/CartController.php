<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Afficher le panier
    public function index()
    {
        $cart = session()->get('cart', []);

        // Récupère les IDs des produits
        $productIds = array_keys($cart);

        // Charge les produits depuis la BDD
        $products = Product::whereIn('id', $productIds)->get();

        // Calcule le total
        $total = 0;
        foreach ($products as $product) {
            $quantity = $cart[$product->id]['quantity'] ?? 0;
            $total += $product->price * $quantity;
        }

        return view('cart.index', compact('products', 'cart', 'total'));
    }

    // Ajouter un produit au panier
    public function add(Request $request, Product $product)
    {
        // On récupère le panier en session (ou un tableau vide s'il n'existe pas)
        $cart = session()->get('cart', []);

        // Si le produit est déjà dans le panier, on incrémente la quantité
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            // Sinon, on l'ajoute avec une quantité de 1
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        // On sauvegarde le panier en session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }

    // Modifier la quantité d'un produit
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer',
        ]);

        $cart = session()->get('cart', []);
        $quantity = (int) $request->quantity;

        if (isset($cart[$product->id])) {
            // Si la quantité est <= 0, on retire le produit du panier
            if ($quantity <= 0) {
                unset($cart[$product->id]);
                session()->put('cart', $cart);
                return back()->with('success', 'Produit retiré du panier.');
            }

            // Sinon update de la quantité
            $cart[$product->id]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return back()->with('success', 'Quantité mise à jour.');
        }

        return back()->with('error', 'Produit introuvable dans le panier.');
    }

    // Retirer un produit du panier
    public function remove(Product $product)
    {
        $cart = session()->get('cart');

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Produit retiré du panier.');
    }

    // Vider tout le panier
    public function clear()
    {
        session()->forget('cart');
        return back()->with('success', 'Votre panier a été vidé.');
    }
}
