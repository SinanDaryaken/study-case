<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        if (env('APP_ENV') != "local"){
            $this->renderable(function (NotFoundHttpException $e, $request) {
                if ($request->is('api/*')) {
                    return response()->json([
                        'message' => 404
                    ], 404);
                }
            });

            $this->renderable(function (ServiceUnavailableHttpException $e, $request) {
                if ($request->is('api/*')) {
                    return response()->json([
                        'message' => 503
                    ], 503);
                }
            });

            $this->renderable(function (Throwable $e, $request) {
                if ($request->is('api/*')) {
                    return response()->json([
                        'message' => 500
                    ], 500);
                }
            });
        }
    }
}
