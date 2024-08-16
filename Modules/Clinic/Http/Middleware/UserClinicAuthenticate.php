<?php

namespace Modules\Clinic\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserClinicAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->type !=2 ||  Auth::user()->type!=4 || Auth::user()->type!=5|| Auth::user()->type!=7) {
            return $next($request);
        }
        return redirect('/');
    }
}
