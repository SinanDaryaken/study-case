<?php

namespace App\Facades;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @method static JsonResponse response()
 * @method static self setData(array $data)
 * @method static self setMessage(string $message)
 * @method static self setStatus(bool $status)
 * @method static self setStatusCode(int $code)
 * @see \App\Services\JsonOutputService
 */
class JsonOutputService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'jsonOutputService';
    }
}
