<?php

use App\Http\Controllers\WebHook\WebHookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/webhook', [WebHookController::class, 'webhook']);
