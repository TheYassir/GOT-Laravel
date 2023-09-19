<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    // Dans la convention Lumen, la table doit porter le nom du model au pluriel. Ici, on n'a pas respecté cette convention. 
    // On doit donc créer une propriété "$table" qui va servir à définir le nom de la table.
    protected $table = 'title';


    
}