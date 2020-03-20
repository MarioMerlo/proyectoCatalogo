<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    //
    //protected $table = 'marcas'; #En este caso no es necesario aclarar el nombre de la tabla, porque s[olo agrega la S del plural.
    // protected $primaryKey= 'idMarca' #Esto no es necesario para el alta, pero si para el update. Esto es para el ID, solo si es autoincremental. Si no se pone de otra forma.
    public $timestamps = false; // Esto es para que no intente agregar fecha de creacion y de update, que hace por defecto Laravel


}
