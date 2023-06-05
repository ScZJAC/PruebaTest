<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
/**
* @OA\Info(title="API Prueba", version="1.0")
*
* @OA\Server(url="http://127.0.0.1:8000")
*
* 
* @OAS\SecurityScheme(
*     securityScheme="bearer_token",
*     type="http",
*     scheme="bearer"
* )
*/


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
    * @OA\Post(
    *     path="/api/auth/login",
    *     summary="Obtiene el token despues de Loguearse",
    * @OA\RequestBody(
    *         @OA\MediaType(
    *             mediaType="application/json",
    *             @OA\Schema(
    *                 @OA\Property(
    *                     property="email",
    *                     type="string"
    *                 ), 
    *                 @OA\Property(
    *                     property="password",
    *                     type="string"
    *                 ),
    *                 example={"email": "prueba@gmail.com", "password": "123456789"}
    *             )
    *         )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Obtiene el token"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    
    public function login(Request $request)
    {
    	$validator = $request->only('email', 'password');
        try {
            if (!$token = auth('api')->attempt($validator)) {
                return response()->json(['error'=> 'intento de inicio de sesión de usuario no autorizado'], 401);
            } 
        } catch (JWTException $e) {
            return response()->json(['error'=> 'No se Creo el Token'],500);
        }
        return $this->createNewToken($token, $request);
    }
    public function profile()
    {
        # code...
        return response()->json(auth('api')->user());
    }
    public function me()
    {
        return response()->json(auth()->user());
    }
    protected function createNewToken($token, $request)
    {
        
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer'

        ]);
    }
    /**
    * @OA\Get(
    *     path="/api/auth/getCiudades",
    *     summary="Obtiene las Ciudades de Argentina con sus provincias",
    *     security={{"bearer_token":{}}},
    *     @OA\Response(
    *         response=200,
    *         description="Obtiene las Ciudades de Argentina"
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function getCiudades(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['error'=> 'No autorizado'], 401);
        }
        $ciudades =DB::table('ciudades as a') 
                ->select('a.descripcion_ciudad as ciudad','b.descripcion_provincia as provincia')
                ->leftJoin('provincias as b', 'b.id_provincia', '=', 'a.id_provincia') 
                ->get();
        return response()->json($ciudades);
    }
}
