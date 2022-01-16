<?php

namespace App\Http\Middleware;

use Closure;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Closure
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            if (session('berhasil.login')){
                return redirect('/');
            }
            return $next($request);
    }
}
