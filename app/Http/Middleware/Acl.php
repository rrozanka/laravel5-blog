<?php

namespace App\Http\Middleware;

/**
 * Class Acl
 *
 * @package App\Http\Middleware
 */
class Acl {

	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request  $request
	 * @param \Closure  $next
	 *
	 * @return mixed
	 */
	public function handle($request, \Closure $next)
	{
		if (!\Entrust::can(\Route::current()->getActionName())) {
			if ($request->ajax()) {
				return response('Unauthorized.', 401);
			}

			return redirect('/deny');
		}

		return $next($request);
	}

}
