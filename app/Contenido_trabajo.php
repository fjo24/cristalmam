<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido_trabajo extends Model
{
    protected $table    = "contenido_trabajos";
    protected $fillable = [
        'contenido',
    ];
}
