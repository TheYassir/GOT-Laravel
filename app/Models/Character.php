<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    // Dans la convention Lumen, la table doit porter le nom du model au pluriel. Ici, on n'a pas respecté cette convention. 
    // On doit donc créer une propriété "$table" qui va servir à définir le nom de la table.
    protected $table = 'character';


    // Définition de la relation avec le model Title.
    // Un personnage a UN titre uniquement.
    // Comme on n'a pas respecté les conventions Lumen, on doit préciser quelles sont les clés servant à faire la liaison.
    // Ici, on indique que la colonne "id" dans du model Title correspond à la colonne "id_title" du model courant (Character).
    public function title()
    {
        return $this->hasOne('App\Models\Title', 'id', 'id_title');
    }

    // Définition de la relation avec la mère du personnage. 
    // On fait donc référence à un autre personne, donc le même model !
    // On pourrait remplacer "self::class" par "App\Models\Character". Comme on est déjà dans cette classe, il est préférable d'utiliser ce raccourci. 
    // Ainsi, si le nom de la classe change, on n'aura pas à le changer dans tout le fichier !
    // En paramètres, on indique que la colonne "mother_id" correspond à la colonne "id" d'un autre personnage.
    public function mother()
    {
        return $this->hasOne(self::class, 'id', 'mother_id');
    }

    // Définition de la relation avec le père du personnage. On utilise exactement le même principe.
    public function father()
    {
        return $this->hasOne(self::class, 'id', 'father_id');
    }

    // Définition de la relation avec le model house
    // Un personnage peut avoir une ou plusieurs maisons, on a donc besoin d'une table pivot.
    // Encore une fois, on n'a pas respecté les conventions. Il faut donc préciser le nom de la table pivot (house_has_characters) en 2nd argument et les clés étrangères sur celle-ci en 3ème et 4ème arguments (character et house).
    public function houses()
    {
        return $this->belongsToMany('App\Models\House', 'house_has_characters', 'character', 'house');
    }
}