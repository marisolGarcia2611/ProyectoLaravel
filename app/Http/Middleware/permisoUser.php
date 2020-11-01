<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use App\User;
use Closure;

class permisoUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=User::where('email',$request->email)->first();
        if($user->tipoUsuario=='user')
        {
            return $next($request);
        
        }
        return abort('Validacion fallida',401);

        
    }
}
