<?php

namespace App\Http\Controllers; // Adresse du fichier
// C'est comme dire que ce fichier est rangé dans le dossier "App > Http > Controllers".
// Cela permet au reste de l'application de le trouver facilement

use Illuminate\Http\Request; // Importation d'outils
// On importe des outils de Laravel (ici "Request") dont on pourrait avoir besoin,
// même si dans cet exemple précis, on ne s'en sert pas encore [web:8].

class PageController extends Controller
// Définition de la classe : On crée un plan nommé "PageController".
// "extends Controller" signifie qu'il hérite de tous les pouvoirs de base
// d'un contrôleur Laravel standard
{
    // Méthode pour la page d'accueil
    public function home()
    {
        // On prépare les données de la boutique
        // C'est comme remplir un carton avant de l'envoyer à l'entrepôt (la Vue)
        $shopData = [
            'nom_boutique' => 'Joelino Design',
            'nombre_produits' => 273,
            'est_ouvert' => true,
        ];

        $url = route('products.show', ['id' => 42]);

        // On envoie le tout à la vue 'home'
        // 'compact' est une fonction magique PHP qui crée le tableau ['shopData' => $shopData, 'url' => $url] automatiquement
        return view('home', compact('shopData', 'url'));
    }

    // Méthode pour la page À propos
    public function about()
    {
        return "Je suis Joel, Designer Industriel basé à Berlin. Ici, on parle chaises et créativité.";
    }
}
