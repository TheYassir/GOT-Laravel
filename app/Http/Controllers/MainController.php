<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\House;

class MainController extends Controller{

    /**
     * Gestion de la page d'accueil
     *
     */
    public function homepage()
    {
        $characters = Character::all();
        // La fonction compact permet de créer un tableau avec un entrées les variables dont le nom est passé en argument.
        // Ainsi, on crée ici un tableau avec une entrée "characters" qui a pour valeur le contenu de la variable $characters.
        // Un peu comme $viewVars !
        // Ce tableau sera ensuite décomposé dans notre vue en autant de variables qu'il y a d'entrées. On pourra donc utiliser une variable $characters.
        // https://www.php.net/manual/fr/function.compact.php
        return view('homepage', ['characters' => $characters]);
    }

    /**
     * Page d'un personnage
     *
     * @param int $id
     */
    public function characterPage($id)
    {
        $character = Character::find($id);

        return view('character', compact('character'));
    }

    /**
     * Page listant toutes les maisons
     *
     */
    public function houses()
    {
        $houses = House::all();
        return view('houses', compact('houses'));

    }

    /**
     * Page listant tous les personnages d'une maison
     *
     * @param int $id
     */
    public function house($id)
    {
        $house = House::find($id);
        // On récupère les personnages liés à la maison chargée d'après l'ID de l'url.
        $characters = $house->characters;

        return view('house', compact('house','characters'));

    }
}
