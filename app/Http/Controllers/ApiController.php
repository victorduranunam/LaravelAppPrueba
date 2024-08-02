<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class ApiController extends Controller
{
    public function index()
    {
        $client = new Client();
        try {
            // Realizar una solicitud GET para obtener la lista de usuarios
            $response = $client->get('https://jsonplaceholder.typicode.com/users');

            // Obtener el cuerpo de la respuesta como JSON
            $users = json_decode($response->getBody(), true);

            // Retornar la vista con los datos
            return view('verApi', ['users' => $users]);

        } catch (\Exception $e) {
            // Manejar errores
            return view('error', ['message' => 'Error: ' . $e->getMessage()]);
        }
    }
}

