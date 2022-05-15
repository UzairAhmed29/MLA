<?php

namespace App\Http\Middleware;

use Closure;

class OfficeAssistantRole
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
        // if(auth()->user()->role === 'office-assistant') {
        //     // return redirect(route('expenditures.index'));
        // }
        return $next($request);
    }
}
