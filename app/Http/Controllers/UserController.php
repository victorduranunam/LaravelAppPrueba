<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = \DB::table('users')->get();
        return view('usuario', compact('usuarios'));
    }




    public function delete($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if ($user) {
            DB::table('users')->where('id', $id)->delete();
            return redirect()->route('usuario.index')->with('success', 'Usuario eliminado exitosamente');
        }
        return redirect()->route('usuario.index')->with('error', 'No se encontró el usuario');
    }



    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if (!$user) {
            return redirect()->route('usuario.index')->with('error', 'El usuario no fue encontrado.');
        }
        return view('usuario.edit', compact('user'));
    }



    public function update(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);
    return redirect()->route('usuario.index')->with('success', 'Usuario actualizado exitosamente.');
    }


    public function show()
    {
        return view('usuario.show');
    }


    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Inserción del nuevo usuario utilizando Query Builder
        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => 'clave',
        ]);

        // Redirección con mensaje de éxito
        return redirect()->route('usuario.index')->with('success', 'Usuario agregado exitosamente.');
    }


}
