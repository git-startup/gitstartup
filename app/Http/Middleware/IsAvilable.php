<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAvilable
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
      if(Auth::user() and Auth::user()->is_deleted == 1 OR Auth::user() and Auth::user()->is_disable == 1){
        return redirect('/login');
      }
      return $next($request);
    }
}
