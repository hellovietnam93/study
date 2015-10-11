<?php

namespace studyhub\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
  protected $dontReport = [
    HttpException::class,
  ];

  public function report(Exception $e)
  {
    return parent::report($e);
  }

  public function render($request, Exception $e)
  {
    switch (class_basename($e)) {
      case 'InvalidUserException':
        flash()->warning($e->getMessage());
        return redirect()->home();

      case 'InvalidRolesException':
        flash()->warning($e->getMessage());
        return redirect()->home();

      case 'ModelNotFoundException':
        abort(404);
        break;
    };
    return parent::render($request, $e);
  }
}
