<?php

namespace App\Http\Controllers; // Adresse du fichier
// C'est comme dire que ce fichier est rangé dans le dossier "App > Http > Controllers".
// Cela permet au reste de l'application de le trouver facilement

use Illuminate\Http\Request; // Importation d'outils
// On importe des outils de Laravel (ici "Request") dont on pourrait avoir besoin,
// même si dans cet exemple précis, on ne s'en sert pas encore
class PageController extends Controller
{
    public function home()
    {
        $shopData = [
            'nom_boutique' => 'Disney Design',
            'nombre_produits' => 273,
            'est_ouvert' => true,
        ];

        $url = route('products.show', 42);


        // 'compact' est une fonction magique PHP qui crée le tableau ['shopData' => $shopData, 'url' => $url] automatiquement
        return view('home', compact('shopData', 'url'));
        // compact sert a eviter de faire ça

        //return view('home', [
        //'shopData' => $shopData,
        // 'url' => $url
        //]);
    }

    public function about()
    {
        return "Je suis un magicien, Designer Industriel basé peut etre à Berlin. Passionné par le design fonctionnel et minimaliste.";
    }
}
