<h1>Listado de Usuarios</h1>

@foreach ($users as $user)
    <p>ID: {{ $user['id'] }}, Nombre: {{ $user['name'] }}, Email: {{ $user['email'] }}</p>
@endforeach
