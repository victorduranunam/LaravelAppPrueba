<h2>Agregar usuario</h2>
<form method="POST" action="{{ route('usuario.store') }}">
    @csrf
    <label for="name">Nombre:</label>
    <input type="text" name="name" value="" required>

    <br><label for="email">Email:</label>
    <input type="email" name="email" value="" required>

    <br><label for="phone">Teléfono:</label>
    <input type="phone" name="phone" value="" required>

    <br><button type="submit">Guardar cambios</button>
</form>
