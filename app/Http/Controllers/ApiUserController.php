<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use App\Models\User;


class ApiUserController extends Controller
{
    public function index()
        {
            $users = User::all();
            return response()->json($users, 200, [], JSON_PRETTY_PRINT);
        }

    public function showByID($id)
        {
            $users = User::where('id', $id)->get();
            return response()->json($users, 200, [], JSON_PRETTY_PRINT);
        }

        public function store(Request $request)
        {
            // Validar la solicitud
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required|string|min:8',
            ]);

            // Verificar si la validación falla
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            // Crear el nuevo usuario
            $usuario = new User;
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            $usuario->password = $request->input('password');
            //$usuario->password = Hash::make($request->input('password')); // Hash de la contraseña

            // Guardar el usuario en la base de datos
            if ($usuario->save()) {
                return response()->json(['message' => 'Usuario creado exitosamente', 'user' => $usuario], 201);
            } else {
                return response()->json(['message' => 'Error al crear el usuario'], 500);
            }
        }

    }



