<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientosController extends Controller
{
    public function index()
    {
        $tratamientos = Tratamiento::all();
        return response()->json($tratamientos,200);
    }

    public function store(Request $request)
    {
        $tratamiento = Tratamiento::create($request->all());
        return response()->json($tratamiento,200);
    }

    public function show($id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        return response()->json($tratamiento,200);
    }

    public function update(Request $request, $id)
    {
        Tratamiento::findOrFail($id)->update($request->all());
        return response()->json(['Ok'],200);
    }
}
