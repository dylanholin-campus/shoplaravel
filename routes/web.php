<?php

use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return 'Hello World!';
});

// Route vers la page d'accueil
Route::get('/', function () {
    return 'Bienvenue sur ShopLaravel!';
});
