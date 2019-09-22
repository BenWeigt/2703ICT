<?php

namespace grubly\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Administrator
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
		if (Auth::user()->type === 'administrator')
			return $next($request);
		return abort(404);
	}
}
