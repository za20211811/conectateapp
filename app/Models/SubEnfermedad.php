<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubEnfermedad extends Model
{
    public $timestamps = false;
    public $table = "subenfermedades";
    protected $fillable = [
        'idSubEnfermedad', 'nombre', 'idEnfermedad',
    ];
}
