<?php

namespace studyhub\Http\Middleware;

use Closure;

class Authenticate
{
  public function handle($request, Closure $next)
  {
    if (auth()->guest()) {
      if ($request->ajax()) {
        return response('Unauthorized.', 401);
      } else {
        return redirect()->guest('auth/login');
      }
    }
    return $next($request);
  }
}
