<?php

namespace App\Modules\Invoices\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Throwable;

class UnprocessableContentException extends Exception
{
    public function __construct(string $message = 'Unprocessable content', int $code = 422, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'error'  => $this->getMessage(),
            'status' => $this->getCode(),
            'data'   => [],
        ], $this->getCode());
    }
}
