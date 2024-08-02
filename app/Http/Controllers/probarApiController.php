<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class probarApiController extends Controller
{
    public function fetchData()
    {
       // $client = new Client();

        //$client = new Client([
            // Base URI is used with relative requests
        //    'base_uri' => 'http://127.0.0.1:8000/api/AppPrueba/usuarios',
            // You can set any number of default request options.
        //    'timeout'  => 2.0,
        //]);




        //$response = $client->request('GET', 'http://127.0.0.1:8000/api/AppPrueba/usuarios');

        //return view('data', ['data' => json_decode($response->getBody()->getContents(), true)]);
        return "hola";
    }
}

