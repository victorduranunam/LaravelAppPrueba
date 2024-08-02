<h2>Lista de Usuarios</h2>

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-danger">
        {{ session('success') }}
    </div>
@endif

<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->phone }}</td>
            <td>
                <form action="{{ route('usuario.delete', ['id' => $usuario->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Borrar</button>
                </form>
            </td>
            <td>
                <form action="{{ route('usuario.edit', ['id' => $usuario->id]) }}" method="get">
                    @csrf
                    @method('edit')
                    <button type="submit">Editar</button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
