<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // La variable $id récupère ce qui est écrit dans l'URL
    public function show($id)
    {
        return "Détails du produit n° " . $id;
    }
}
