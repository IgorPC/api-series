<?php

namespace App\Http\Middleware;

use App\User;
use Illuminate\Http\Client\Request;
use Firebase\JWT\JWT;

class Autenticador
{
    public function handle($request, \Closure $next)
    {
        try
        {
            if (!$request->hasHeader('Authorization')) {
                throw new \Exception();
            }
            $authorizationOnHeader = $request->header('Authorization');
            $token = str_replace('Bearer ', '', $authorizationOnHeader);
            $dadosAutenticacao = JWT::decode($token, env('JWT_KEY'), ['HS256']);
            $usuario = User::where('email', $dadosAutenticacao->email)->first();

            if (is_null($usuario)) {
                throw new \Exception();
            }

            return $next($request);
        }catch (\Exception $e){
            return response()->json('Não Autorizado', 401);
        }
    }
}
