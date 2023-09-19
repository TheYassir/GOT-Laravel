<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    // Dans la convention Lumen, la table doit porter le nom du model au pluriel. Ici, on n'a pas respecté cette convention. 
    // On doit donc créer une propriété "$table" qui va servir à définir le nom de la table.
    protected $table = 'house';
    

    // Définition de la relation avec le model Character
    // Une maison peut avoir un ou plusieurs personnages, on a donc besoin d'une table pivot.
    // Encore une fois, on n'a pas respecté les conventions. Il faut donc préciser le nom de la table pivot (house_has_characters) en 2nd argument et les clés étrangères sur celle-ci en 3ème et 4ème arguments (character et house).
    public function characters()
    {
        return $this->belongsToMany('App\Models\Character', 'house_has_characters',  'house', 'character');
    }
}