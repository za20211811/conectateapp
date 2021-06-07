<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    public $timestamps = false;
    public $table = "enfermedades";
    protected $fillable = [
        'idEnfermedad', 'nombre', 'descripcion', 'idTipo',
    ];

}
