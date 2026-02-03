<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'Chaise Industrielle Acier', 'price' => 120],
            ['id' => 2, 'name' => 'Lampe Atelier Vintage', 'price' => 85],
            ['id' => 3, 'name' => 'Table Basse Bois Massif', 'price' => 250],
            ['id' => 4, 'name' => 'Étagère Murale Métal', 'price' => 60],
            ['id' => 5, 'name' => 'Tabouret de Bar Réglable', 'price' => 95],
        ];
        return view('products.index', compact('products'));
    }
    public function show($id)
    {
        return "Détails du produit n° " . $id;
    }
}
