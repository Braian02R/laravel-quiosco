<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;

class AuthController extends Controller
{
   
    public function register(RegistroRequest $request)
    {
        //validar el registro
        $data = $request->validated();

        // Crear el Usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        // Retornar una Respuesta
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];
    }

    public function login(Request $request)
    {

    }

    public function logout(Request $request)
    {

    }
}
