<?php

    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Alumno;

    class AlumnoApiController extends Controller
    {
        Public function index()
        {
            $alumnos = Alumno::all();
            //return response()->json($alumnos);
            return response()->json($alumnos, 200, [], JSON_PRETTY_PRINT);
        }
    }

?>
