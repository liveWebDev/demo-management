<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class Admin
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
        /*if (Auth::user() AND Auth::user()->type == 1) {
            return $next($request);
        }

        Session::flash('failed', 'Your not authorized to access that location.');
        return redirect('/');*/
        
        if (empty($request->user()) || $request->user()->hasRole('administrator')) {           

            return $next($request);
        }
        if ($request->expectsJson())
                return response()->json(['error' => 'Unauthenticated.'], 401);
        return $next('/');
    }
}
