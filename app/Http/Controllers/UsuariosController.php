<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\User;

class UsuariosController extends Controller
{

    public function store(UsuarioRequest $request)
    {
        $us = $request->all();
        $us['password'] = bcrypt($request->password);
        $usuario = User::create($us);
        return response()->json($usuario,200);
    }

    public function show($id)
    {
        $usuario = User::where('email',$id)->first();
        return response()->json($usuario,200);
    }

    public function update(UsuarioRequest $request, $id)
    {
        User::findOrFail($id)->update($request->all());
        return response()->json(['Ok'],200);
    }

}
