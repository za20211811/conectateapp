<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEnfermedad extends Model
{
    public $timestamps = false;
    public $table = "tipos_enfermedades";
    protected $fillable = [
        'idTipo', 'nombre',
    ];

}
