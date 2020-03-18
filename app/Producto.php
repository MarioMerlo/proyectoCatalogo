<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    ## Relación a tabla Marcas
    public function getMarca() //El nombre es indistitno. Le ponemos get, porque traera marcas
    {
        return $this->belongsTo('App\Marca', 'idMarca', 'idMarca');
    }

    ## Relación a tabla Categorias
    public function getCategoria()
    {
        return $this->belongsTo('App\Categoria', 'idCategoria', 'idCategoria');
    }
}
