<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Pengguna
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
	 */
	function handle($request, Closure $next)
	{
		if (Auth::check() && Auth::user()->role == 'pengguna') {
			return $next($request);
		}
		elseif (Auth::check() && Auth::user()->role == 'pakar') {
			return redirect('/pakar');
		}
		else {
			return redirect('/admin');
		}
	}
}
