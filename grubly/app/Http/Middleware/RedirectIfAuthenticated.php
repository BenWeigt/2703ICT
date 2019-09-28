<?php

namespace grubly\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RedirectIfAuthenticated
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null)
	{
		// auth_redirectTo used in the auth controllers to redirect the user back to their starting
		// page when auth process is complete.
		if (Auth::guard($guard)->check()) {
			session(['auth_redirectTo' => null]);
			return back(); // @TODO for some edge cases, this is capable of producing a redirect loop
		}
		// Checks might be overly protective, but an infinite redirection loop would suck.
		if (url()->previous() !== session('auth_previous') && url()->previous() !== url()->current())
			session(['auth_redirectTo' => url()->previous()]);
		session(['auth_previous' => url()->current()]);
		if (method_exists(Route::current()->controller, 'setRedirectTo') && session('auth_redirectTo') !== url()->current())
		{
			Route::current()->controller->setRedirectTo(session('auth_redirectTo'));
		}
		return $next($request);
	}
}
