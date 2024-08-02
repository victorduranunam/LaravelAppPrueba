<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class FormController extends Controller
{
    public function create()
    {
        return view('formulario');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
        ]);
        $nombre = $request->input('nombre');
        $correo = $request->input('correo');
        $resultado = 'Nombre validado para no ser nulo: ' . $nombre . ', Correo validado: para no ser nulo y ser del tipo email  ' . $correo;

        return $request;
        //return $resultado;
    }

}

