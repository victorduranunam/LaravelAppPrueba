<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tus etiquetas head aquí -->
</head>
<body>

    <h1>Datos del usuario</h1>

    <form method="POST" action="{{ route('formulario.store') }}">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre">
        {!! $errors->first('nombre','<font color="blue">::message </font>') !!}
        <br><input type="email" name="correo" placeholder="Dirección de correo">
        <br><input type="text" name="titulo" placeholder="Título del correo">
        <br><textarea name="contenido" placeholder="Mensaje del correo"></textarea>
        <br><button>Enviar</button>
    </form>

</body>
</html>




