<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationDetailController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomPictureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route as ro;

ro::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


ro::get('/', function () {
    return response()->json(['message' => 'Hello World']);
});

ro::apiResource('/reservation', ReservationController::class);
ro::apiResource('/room', RoomController::class);
ro::apiResource('/rpicture', RoomPictureController::class);
ro::apiResource('/department', DepartmentController::class);
ro::apiResource('/position', PositionController::class);
ro::apiResource('/customer', CustomerController::class);
ro::apiResource('/employee', EmployeeController::class);
ro::apiResource('/rdetail', ReservationDetailController::class);
ro::apiResource('/product', ProductController::class);
ro::apiResource('/product-category', ProductCategoryController::class);
