<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

// Route de test simple
Route::get('/hello', function () {
    return 'Hello Laravel!';
});

// Routes publiques (tout le monde)
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::resource('products', ProductController::class)->only(['index', 'show']);

// Auth (invités uniquement)
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/login', [LoginController::class, 'showForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Déconnexion (utilisateurs authentifiés)
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');

// Routes protégées (middleware auth)
Route::middleware('auth')->group(function () {
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

    // --- Routes des Commandes ---
    Route::resource('orders', OrderController::class)->only(['index', 'store', 'show']);
});

// Routes produits réservées à l'admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductController::class)->except(['index', 'show']);
});

// Routes d'administration
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('categories', AdminCategoryController::class);
});
