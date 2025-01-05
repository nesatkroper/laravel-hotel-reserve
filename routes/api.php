<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route as ro;

ro::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


ro::get('/', function () {
    return response()->json(['message' => 'Hello World']);
});

ro::apiResource('/reserve', ReservationController::class);
