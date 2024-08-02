<?php

namespace Tests\Feature;

use Tests\TestCase;
use GuzzleHttp\Client;

class UsuariosTest extends TestCase
{
    /** @test */
    public function it_can_fetch_all_users()
    {
        // Crear un cliente Guzzle
        $client = new Client();

        // Realizar una solicitud GET al endpoint
        $response = $client->request('GET', 'http://127.0.0.1:8000/api/AppPrueba/usuarios');

        // Verificar que la respuesta tenga el código de estado 200
        $this->assertEquals(200, $response->getStatusCode());

        // Obtener el contenido de la respuesta
        $data = json_decode($response->getBody(), true);

        // Imprimir el contenido de la respuesta
        print_r($data);

        // Verificar que el contenido sea un array (asumiendo que devuelve una lista de usuarios)
        $this->assertIsArray($data);


    }
}
