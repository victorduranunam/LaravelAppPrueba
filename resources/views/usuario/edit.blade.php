
<h2>Modificar datos del usuario</h2>
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


<form method="POST" action="{{ route('usuario.update', $user->id) }}">
    @csrf
    @method('PUT')

    <label for="name">Nombre:</label>
    <input type="text" name="name" value="{{ $user->name }}" required>

    <br><label for="email">Email:</label>
    <input type="email" name="email" value="{{ $user->email }}" required>

    <br><label for="phone">Tel&eacute;fono:</label>
    <input type="phone" name="phone" value="{{ $user->phone }}" required>


    <br><button type="submit">Guardar cambios</button>
</form>

