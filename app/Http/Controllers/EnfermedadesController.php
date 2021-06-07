<?php

namespace App\Http\Controllers;

use App\Models\Enfermedad;
use App\Models\SubEnfermedad;
use Illuminate\Http\Request;

class EnfermedadesController extends Controller
{

    public function index()
    {
        $enfermedades = Enfermedad::orderBy('nombre')->get();
        return response()->json($enfermedades,200);
    }

    public function store(Request $request)
    {
        $enfermedad = Enfermedad::create($request->all());
        return response()->json($enfermedad,200);
    }

    public function show($id)
    {
        $enfermedad = Enfermedad::where('idEnfermedad',$id)->first();
        return response()->json($enfermedad,200);
    }

    public function subenfermedades($id){
        $sub = SubEnfermedad::where('idEnfermedad',$id)->get();
        return response()->json($sub,200);
    }

    public function listado($id)
    {
        $enfermedades = Enfermedad::where('idTipo',$id)->get();
        return response()->json($enfermedades,200);

    }

    public function buscar($id){
        $enfermedades = Enfermedad::where('nombre','LIKE',"%$id%")->get();
        return response()->json($enfermedades,200);
    }

    public function update(Request $request, $id)
    {
        Enfermedad::findOrFail($id)->update($request->all());
        return response()->json(['Ok'],200);
    }

}
