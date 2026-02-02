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
    // On génère l'URL pour le produit n°42
    $url = route('products.show', ['id' => 42]);

    // On retourne le message + l'URL générée
    return "Bienvenue ! Visitez notre produit vedette ici : " . $url;
}

    // Méthode pour la page À propos
    public function about()
    {
        return "Je suis Joel, Designer Industriel basé à Berlin. Ici, on parle chaises et créativité.";
    }
}
