<?php

namespace App\Http\Middleware;

use Closure;

use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException){
                return response()->json(['status' => 'El token es invalido.']);
            }else if ($e instanceof TokenExpiredException){
                return response()->json(['status' => 'El token expiró.']);
            }else {
                return response()->json(['status' => 'No se encontro ningun token.']);
            }
        }
        return $next($request);
    }
}
