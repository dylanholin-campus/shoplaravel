<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
// Importation : On dit à Laravel qu'on va utiliser son système de "Route"
// et notre "PageController" qu'on a créé juste avant
use App\Http\Controllers\ProductController;

Route::get('/hello', function () {
    return 'Hello Laravel!';
});
// Si l'utilisateur va sur "monsite.com/hello", Laravel exécute
// directement cette petite fonction qui affiche "Hello Laravel!"
// sans passer par un contrôleur [web:4].

Route::get('/', [PageController::class, 'home'])->name('home');
// Laravel appelle la classe PageController et active sa méthode 'home' 
Route::get('/about', [PageController::class, 'about'])->name('about');

// Le {id} indique à Laravel : "Accepte n'importe quoi ici et passe-le au controller"
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
// Route pour la liste des produits
// On utilise souvent '/products' pour lister
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
