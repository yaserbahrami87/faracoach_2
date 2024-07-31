<?php

namespace Modules\Crm\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticate
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
        if(Auth::check())
        {
            if ($request->user()->type != 2 || $request->user()->type != 3 || $request->user()->type != 4 || $request->user()->type != 5 || $request->user()->type != 6 || $request->user()->type != 7) {
                return $next($request);
            }
        }
        return redirect('/');
    }
}
