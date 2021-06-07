<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    public $timestamps = false;
    public $table = "favoritos";
    protected $fillable = [
        'email', 'idEnfermedad',
    ];
}
