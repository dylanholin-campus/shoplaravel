<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Afficher la liste des commandes de l'utilisateur
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $orders = $user->orders()->latest()->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Afficher les détails d'une commande
     */
    public function show(Request $request, Order $order)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        // Vérifier que l'utilisateur ne voit que ses propres commandes
        if ($order->user_id !== $user->id) {
            return redirect()->route('orders.index')->with('error', 'Accès refusé.');
        }

        $order->load('orderItems.product');

        return view('orders.show', compact('order'));
    }

    /**
     * Créer une commande à partir du panier
     */
    public function store(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $cart = session()->get('cart', []);

        // Vérifier que le panier n'est pas vide
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        // Récupérer les produits du panier
        $products = Product::whereIn('id', array_keys($cart))->get();

        if ($products->count() !== count($cart)) {
            return redirect()->route('cart.index')->with('error', 'Certains produits n\'existent plus.');
        }

        // Vérifier le stock et calculer le total
        $total = 0;
        foreach ($products as $product) {
            $quantity = $cart[$product->id];

            if ($product->stock < $quantity) {
                return redirect()->route('cart.index')->with('error', "Stock insuffisant pour {$product->name}.");
            }

            $total += $product->price * $quantity;
        }

        // Créer la commande et ses lignes avec une transaction
        try {
            $order = DB::transaction(function () use ($products, $cart, $total, $user) {
                // Créer la commande
                $order = Order::create([
                    'user_id' => $user->id,
                    'total' => $total,
                    'status' => 'pending',
                ]);

                // Créer les lignes de commande et réduire le stock
                foreach ($products as $product) {
                    $quantity = $cart[$product->id];

                    $order->orderItems()->create([
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                        'unit_price' => $product->price,
                    ]);

                    // Réduire le stock du produit
                    $product->decrement('stock', $quantity);
                }

                return $order;
            });

            // Vider le panier
            session()->forget('cart');

            return redirect()->route('orders.show', $order)->with('success', 'Commande créée avec succès !');
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'Une erreur est survenue lors de la création de la commande.');
        }
    }
}
