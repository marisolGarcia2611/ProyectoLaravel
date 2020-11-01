<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use App\User;
use Closure;

class permisoAdmin
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
        $admin=User::where('email',$request->email)->first();
        if($admin->tipoUsuario=='admin')
        {
            return $next($request);
        
        }
        return abort('Validacion fallida',401);

        
    }
}
