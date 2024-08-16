<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use App\Models\User;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Documentación de la API appPrueba ",
 *     description="API documentation with OpenAPI/Swagger",
 *     @OA\Contact(
 *         email="support@example.com"
 *     )
 * )
 * @OA\Server(
 *     url="http://127.0.0.1:8000/api/AppPrueba"
 * )
 */




class ApiUserController extends Controller
{

     // Constructor para aplicar el middleware de autenticación JWT
     public function __construct()
     {
         $this->middleware('auth:api');
     }



    /**
     * @OA\Get(
     *     path="/usuarios",
     *     tags={"Usuarios"},
     *     summary="Lista de usuarios",
     *     description="Regresa la lista de los usuarios",
     *     @OA\Response(
     *         response=200,
     *         description="Operacion exitosa",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object"
     *             )
     *         )
     *     )
     * )
     */

    public function index()
        {
            $users = User::all();
            return response()->json($users, 200, [], JSON_PRETTY_PRINT);
        }

    public function showByID($id)
        {
            $users = User::where('id', $id)->get();
            return response()->json($users, 200, [], JSON_PRETTY_PRINT);
        }


    /**
     * @OA\Post(
     *     path="/usuarios/",
     *     tags={"Usuarios"},
     *     summary="Agregar usuario",
     *     description="Agregasr nuevo usuario",
     * @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email","password"},
     *             @OA\Property(property="name", type="string", example="Juan Lopez"),
     *             @OA\Property(property="email", type="string", example="usuario1@correo.com"),
     *             @OA\Property(property="password", type="string", example="123456"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Usuaio creado en forma exitosa"
     *     )
     * )
    */

    public function store(Request $request)
        {
            // Validar la solicitud
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required|string|min:8',
            ]);

            // Verificar si la validación falla
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            // Crear el nuevo usuario
            $usuario = new User;
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            $usuario->password = $request->input('password');


            // Guardar el usuario en la base de datos
            if ($usuario->save()) {
                return response()->json(['message' => 'Usuario creado exitosamente', 'user' => $usuario], 201);
            } else {
                return response()->json(['message' => 'Error al crear el usuario'], 500);
            }
        }

    public function destroy($id)
        {

            $usuario = User::find($id);  // Buscar el usuario por ID

            // Verificar si el usuario existe
            if (!$usuario) {
                return response()->json(['message' => 'Usuario no encontrado'], 404);
            }

            // Intentar eliminar el usuario
            if ($usuario->delete()) {
                return response()->json(['message' => 'Usuario eliminado exitosamente'], 200);
            } else {
                return response()->json(['message' => 'Error al eliminar el usuario'], 500);
            }
        }



    public function update(Request $request, $id)
    {
        // Buscar el usuario por ID
        $usuario = User::find($id);

        // Verificar si el usuario existe
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Validar la solicitud
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $id . '|max:255',
            'password' => 'sometimes|required|string|min:4',
        ]);

        // Verificar si la validación falla
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Actualizar los campos permitidos
        if ($request->has('name')) {
            $usuario->name = $request->input('name');
        }
        if ($request->has('email')) {
            $usuario->email = $request->input('email');
        }
        if ($request->has('password')) {
            $usuario->password = $request->input('password');
        }

        // Guardar los cambios en la base de datos
        if ($usuario->save()) {
            return response()->json(['message' => 'Usuario actualizado exitosamente', 'user' => $usuario], 200);
        } else {
            return response()->json(['message' => 'Error al actualizar el usuario'], 500);
        }
    }


}



