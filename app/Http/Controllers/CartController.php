<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return view('cart.index', [
                'products' => collect([]), // Transforme le tableau vide en Collection vide, sa evite les erreurs exemple avec $products->count()
                'total' => 0,
                'cart' => []
            ]);
        }

        $products = Product::whereIn('id', array_keys($cart))->get();

        $total = 0;
        foreach ($products as $product) {
            $qty = $cart[$product->id];
            $product->quantity = $qty;
            $total += $product->price * $qty;
        }

        return view('cart.index', compact('products', 'total', 'cart'));
    }

    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]++;
        } else {
            $cart[$product->id] = 1; // j'ajoute l’ID dans le panier avec une quantité initiale de 1.
        }

        session()->put('cart', $cart); // save

        return back()->with('success', 'Produit ajouté !');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:0|max:100',
        ]);

        $cart = session()->get('cart', []);
        $quantity = (int) $request->quantity;

        if ($quantity === 0) {
            unset($cart[$product->id]);
            $message = 'Produit retiré.';
        } else {
            $cart[$product->id] = $quantity; // On stocke juste l'entier
            $message = 'Panier mis à jour.';
        }

        session()->put('cart', $cart);

        return back()->with('success', $message);
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        unset($cart[$product->id]);

        session()->put('cart', $cart);

        return back()->with('success', 'Produit retiré.');
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('success', 'Panier vidé.');
    }
}
