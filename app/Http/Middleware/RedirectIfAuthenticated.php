<?php

namespace studyhub\Http\Middleware;

use Closure;

class RedirectIfAuthenticated
{
  public function handle($request, Closure $next)
  {
    if (auth()->check()) {
      return redirect()->home();
    }
    return $next($request);
  }
}
