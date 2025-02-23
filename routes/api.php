<?php

use App\Modules\Invoices\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqui você pode registrar as rotas da API para sua aplicação. Essas
| rotas são carregadas pelo RouteServiceProvider e todas elas serão
| atribuídas ao grupo de middleware "api".
|
*/

Route::get('/ping', function () {
    return response()->json('pong', 200);
});

Route::prefix('invoice')->group(function () {
    Route::post('/approve', [InvoiceController::class, 'approve']);
    Route::post('/reject', [InvoiceController::class, 'reject']);
    Route::get('/show/{id}', [InvoiceController::class, 'show']);
});
