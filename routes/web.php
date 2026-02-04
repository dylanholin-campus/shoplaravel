<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

// Route de test simple
Route::get('/hello', function () {
    return 'Hello Laravel!';
});

// Pages statiques (Home, About) gérées par PageController
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Cette seule ligne remplace tes anciennes routes 'products.index' et 'products.show'
// Elle crée aussi create, store, edit, update, destroy d'un coup.
Route::resource('products', ProductController::class);
