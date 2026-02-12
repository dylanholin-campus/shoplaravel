<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        $shopData = [
            'nom_boutique' => "l' Albion ",
            'nombre_produits' => 273,
            'est_ouvert' => true,
        ];

        $url = route('products.show', 42);

        return view('home', compact('shopData', 'url'));
    }

    public function about()
    {
        return view('about');
    }
}
