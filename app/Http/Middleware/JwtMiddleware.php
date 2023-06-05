<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            //code...
            $user = JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException $e) {
            //throw $th;
            return response()->json(['error'=>'token Expirado'],400);
        }
        catch (JWTException $e) {
            //throw $th;
            return response()->json(['error'=>'token_absent'],400);
        }
        catch (TokenInvalidException $e) {
            //throw $th;
            return response()->json(['error'=>'token Invalido'],400);
        }
        catch (Exception $e) {
            //throw $th;
            return response()->json(['error'=>$e->getMessage()],500);
        }
        return $next($request);
    }
}
