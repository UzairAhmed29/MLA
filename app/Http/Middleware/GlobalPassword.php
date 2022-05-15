<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class GlobalPassword
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
        if(Session::has('isLoggedIn') !== true && Session::get('isLoggedIn') !== 'true') {
            return redirect('/');
        }
        return $next($request);
    }
}
