<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Structure du panier en session simplifiée : [ 101 => 2, 105 => 1 ] (ID => Qté)

    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return view('cart.index', [
                'products' => collect([]), // On transforme le tableau vide en Collection vide
                'total' => 0,
                'cart' => []
            ]);
        }

        // On charge les produits frais depuis la BDD
        $products = Product::whereIn('id', array_keys($cart))->get();

        // On calcule le total et on attache la quantité "virtuellement" aux produits pour la vue
        $total = 0;
        foreach ($products as $product) {
            $qty = $cart[$product->id];
            $product->quantity = $qty; // Astuce : on ajoute la qté à l'objet pour la vue
            $total += $product->price * $qty;
        }

        return view('cart.index', compact('products', 'total', 'cart'));
    }

    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        // Gestion simplifiée : si existe on incrémente, sinon on initialise à 1
        // Plus besoin de stocker name/price/image !
        if (isset($cart[$product->id])) {
            $cart[$product->id]++;
        } else {
            $cart[$product->id] = 1;
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Produit ajouté !');
    }

    public function update(Request $request, Product $product)
    {
        // Validation stricte : min 0, max 100 (pour éviter les abus)
        $request->validate([
            'quantity' => 'required|integer|min:0|max:100',
        ]);

        $cart = session()->get('cart', []);
        $quantity = (int) $request->quantity;

        // Si quantité 0, on supprime, sinon on met à jour
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
