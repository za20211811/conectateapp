<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'unique:usuarios|required|email',
            'password'=>'required|string|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Es necesario por lo menos un nombre',
            'apellido.required' => 'Es necesario por lo menos un apellido',
            'email.required' => 'Es necesario un correo electrónico',
            'email.unique'  => 'El correo electrónico ya está en uso',
            'password' => 'La contraseña debe ser de mínimo 8 caracteres, debe contener al menos 1 mayúscula, 1 minúscula, 1 número y un caracter especial'
        ];
    }
}
