<?php

namespace App\Modules\Invoices\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Throwable;

class NotFoundException extends Exception
{
    public function __construct(string $message = 'Not Found', int $code = 404, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'error' => $this->getMessage(),
        ], $this->getCode());
    }
}
