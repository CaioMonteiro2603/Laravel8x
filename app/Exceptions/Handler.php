<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Sobrescreve o render para personalizar resposta JSON.
     */
    public function render($request, Throwable $exception)
    {
        // Quando modelo não encontrado (ex: findOrFail ou Model Binding falham)
        if ($exception instanceof ModelNotFoundException) {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }

        // Quando rota não encontrada
        if ($exception instanceof NotFoundHttpException) {
            return response()->json(['message' => 'Rota não encontrada.'], 404);
        }

        return parent::render($request, $exception);
    }
}
