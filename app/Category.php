<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        //Funzione di relazione
        //La categoria ha tanti posts associati
        return $this->hasMany('App\Post');
    }
}
