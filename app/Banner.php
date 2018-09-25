<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    protected $table    = "banners";
    protected $fillable = [
        'imagen', 'texto1', 'texto2', 'seccion',
    ];
}
