<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Session\TokenMismatchException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof TokenMismatchException) {
            return response()
                ->json(['error' => 'Token is Invalid',
                    'status' => Response::HTTP_UNAUTHORIZED]);
        } elseif ($exception instanceof TokenExpiredException) {
            return response()
                ->json(['error' => 'Token Expired Try New Token',
                    'status' => Response::HTTP_BAD_GATEWAY]);
        } elseif ($exception instanceof TokenBlacklistedException) {
            return response()
                ->json(['error' => 'Token is Black Listed .Get New one',
                    'status' => Response::HTTP_BAD_REQUEST]);
        } elseif ($exception instanceof JWTException) {
            return response()
                ->json(['error' => 'Token is required',
                    'status' => Response::HTTP_UNAUTHORIZED]);
        }
        return parent::render($request, $exception);
    }
}
