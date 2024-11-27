<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Classes\FormatResponse;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends FormatResponse
{
    //FUNCION PARA AHCER LOGIN POR MEDIO DE WEB TOKEN
    public function login(Request $request)
    {
        // VALIDAMOS QUE AL MENOS LLEGUE EL EMAIL Y LA CONTRASEÑA
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'email.required' => 'El email es requerido.',
            'email.email' => 'El email no es válido.',
            'password.required' => 'La Contraseña es requerida.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages); //SE VALIDA QUE LOS CAMPOS SEAN REQUERIDOS Y QUE EL EMAIL SEA VALIDO
        if ($validator->errors()->getMessages()) { //SI HAY ERRORES EN LA VALIDACION
            return $this->toJson($this->estadoOperacionFallida($validator->getMessageBag()->all())); //SE RETORNA EL MENSAJE DE ERROR
        } else {
            try {
                $credentials = $request->only('email', 'password'); //SE OBTIENEN LAS CREDENCIALES
                if (! $token = auth()->attempt($credentials)) { //SE VALIDA EL USUARIO Y CONTRASEÑA CON EL METODO attempt
                    return response()->json(['error' => 'Unauthorized'], 401);
                }
                $user = User::where('email', $request->email)->first(); //SE CONSULTA EL USUARIO POR EL EMAIL
                $date_expires = now()->addMinutes(config('jwt.ttl')); // TIEMPO DE TOKEN 1 HORA
                $timeExpire = $date_expires;

                return $this->responseLogin($token, $timeExpire, $date_expires, $user);
            } catch (JWTException $e) {
                // Si el token ha expirado o es inválido
                return $this->toJson($this->estadoOperacionFallida($e->getMessage()));
            }
        }
    }

    //FUNCION QUE SE LLAMA AL VALIDAR EL LOGIN Y MOSTRAR DATOS DEL USUARIO
    public function responseLogin($token, $timeExpire, $date_expires, $user)
    {
        $mensaje = "Procesado con éxito";
        $response = [
            'code'         => 200,
            'message'      => $mensaje,
            'token'        => $token,
            'expires_at'   => Carbon::parse($timeExpire)->diffForHumans(),
            'date_expires' => Carbon::parse($date_expires)->toDateTimeString(),
            'token_type'   => 'bearer',
            'user'         => $user
        ];
        return $response = [
            'status' => $response
        ];
    }

    /**
     * Logout user (Revoke the token)
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

}
