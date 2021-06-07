<?php

namespace App\Http\Controllers;
use App\Models\SubEnfermedad;
use Illuminate\Http\Request;

class SubEnfermedadesController extends Controller
{
    public function index()
    {
        $enfermedades = SubEnfermedad::all();
        return response()->json($enfermedades,200);
    }

    public function store(Request $request)
    {
        $enfermedad = SubEnfermedad::create($request->all());
        return response()->json($enfermedad,200);
    }

    public function show($id)
    {
        $enfermedad = SubEnfermedad::where('idEnfermedad',$id)->get();
        return response()->json($enfermedad,200);
    }

    public function update(Request $request, $id)
    {
        SubEnfermedad::findOrFail($id)->update($request->all());
        return response()->json(['Ok'],200);
    }
}
