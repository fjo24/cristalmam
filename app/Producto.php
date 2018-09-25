<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table    = "productos";
    protected $fillable = [
        'nombre', 'codigo', 'descripcion', 'capacidad', 'meta_descripcion', 'meta_keywords', 'destacado', 'categoria_id', 'orden',
    ];

    public function imagenes()
    {
        return $this->hasMany('App\Imgproducto');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

}