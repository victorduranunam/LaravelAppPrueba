use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://127.0.0.1:8000/api/AppPrueba/usuarios');

echo $response->getStatusCode(); // 200
echo $response->getBody(); // El contenido de la respuesta
