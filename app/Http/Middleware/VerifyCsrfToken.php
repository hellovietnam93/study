<?php

namespace studyhub\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
  protected $except = [
    'queue/subscribe',
  ];
}
