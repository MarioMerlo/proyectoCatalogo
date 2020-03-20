<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    public $timestamps = false; // Esto es para que no intente agregar fecha de creacion y de update, que hace por defecto Laravel
}
