<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;

// Route de test simple
Route::get('/hello', function () {
    return 'Hello Laravel!';
});

// Pages statiques (Home, About) gérées par PageController
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Cette seule ligne remplace mes anciennes routes 'products.index' et 'products.show'
// Elle crée aussi create, store, edit, update, destroy d'un coup.
Route::resource('products', ProductController::class);
// --- Routes du Panier ---
Route::prefix('cart')->name('cart.')->group(function () {
    // Afficher le panier
    Route::get('/', [CartController::class, 'index'])->name('index');

    // Ajouter un produit (Product $product utilise le Model Binding)
    Route::post('/add/{product}', [CartController::class, 'add'])->name('add');

    // Mettre à jour la quantité d'un produit dans le panier
    Route::patch('/update/{product}', [CartController::class, 'update'])->name('update');

    // Supprimer un produit du panier
    Route::delete('/remove/{product}', [CartController::class, 'remove'])->name('remove');

    // Vider entièrement le panier
    Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
});
