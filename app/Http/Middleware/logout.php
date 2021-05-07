<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class logout
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
        if(Auth::check())
        {
             return $next($request);
        }
        else
        {
            Auth::logout();
            return redirect()->route('login')->withErrors('Unauthorize access!! Please login to continue');
        }
    }
}
