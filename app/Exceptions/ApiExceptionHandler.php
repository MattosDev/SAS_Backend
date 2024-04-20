<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;

class ApiExceptionHandler extends ExceptionHandler
{
    public function render($request, \Throwable $exception)
    {
        if ($exception instanceof AuthenticationException && $request->expectsJson()) {
            return response()->json(['message' => 'Unauthenticated'], Response::HTTP_UNAUTHORIZED);
        }

        return parent::render($request, $exception);
    }
}