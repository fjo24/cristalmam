<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impresion extends Model
{
    protected $table    = "impresiones";
    protected $fillable = [
        'titulo', 'descripcion', 'imagen', 'orden',
    ];
}
