<?php

namespace App\Modules\Invoices\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Invoices\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class PingController extends Controller
{
    /**
     * Responds with a JSON object containing 'pong' to indicate service availability.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ping(): JsonResponse
    {
        return response()->json('pong', 200);
    }
}
