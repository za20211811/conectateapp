<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use http\Env\Response;
use Illuminate\Http\Request;

class FavoritosController extends Controller
{

    public function store(Request $request)
    {
        $favorito = Favorito::create($request->all());

        return response()->json($favorito,200);
    }

    public function show($id)
    {
        if(!$fav = Favorito::select('enfermedades.nombre AS nombre','enfermedades.descripcion AS descripcion')
            ->join('enfermedades','enfermedades.idEnfermedad','=','favoritos.idEnfermedad')
            ->where('email',$id)
            ->get())
        {
            return response()->json(['No hay enfermedades marcadas como favoritos'],200);
        }

        return response()->json($fav,200);
    }

    public function quitar(Request $request){

        Favorito::where([
            ['email','=',$request->correo],
            ['idEnfermedad','=',$request->idEnfermedad],
        ])->delete();
        return response()->json(['Ok'],200);
    }

}
