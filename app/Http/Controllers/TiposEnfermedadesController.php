<?php

namespace App\Http\Controllers;

use App\Models\TipoEnfermedad;
use Illuminate\Http\Request;

class TiposEnfermedadesController extends Controller
{

    public function index()
    {
        $tipos = TipoEnfermedad::all();
        return response()->json($tipos,200);
    }

    public function store(Request $request)
    {
        $tipo = TipoEnfermedad::create($request->all());
        return response()->json($tipo,200);
    }

    public function show($id)
    {
        $tipo = TipoEnfermedad::where('idTipo',$id)->first();
        return response()->json($tipo,200);
    }

    public function update(Request $request, $id)
    {
        TipoEnfermedad::findOrFail($id)->update($request->all());
    }
}
