<?php

namespace App\Http\Middleware;

use Closure;

class verificarEdad
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
        if($request->edad<=17)
        {return abort(400,'La edad no es valida');}
        return $next($request);
    }
}
