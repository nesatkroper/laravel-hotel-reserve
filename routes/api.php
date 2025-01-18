<?php

use App\Http\Controllers\BankNoteController;
use App\Http\Controllers\CloseShiftController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OpenShiftController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationDetailController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomPictureController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;
use App\Http\Controllers\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route as ro;

ro::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

ro::apiResource('/reservation', ReservationController::class);
ro::apiResource('/room', RoomController::class);
ro::apiResource('/room-picture', RoomPictureController::class);
ro::apiResource('/department', DepartmentController::class);
ro::apiResource('/position', PositionController::class);
ro::apiResource('/customer', CustomerController::class);
ro::apiResource('/employee', EmployeeController::class);
ro::apiResource('/reservation-detail', ReservationDetailController::class);
ro::apiResource('/products', ProductController::class);
ro::apiResource('/product-category', ProductCategoryController::class);
ro::apiResource('/product-stock', ProductStockController::class);
ro::apiResource('/supplier', SupplierController::class);
ro::apiResource('/sale', SaleController::class);
ro::apiResource('/sale-detail', SaleDetailController::class);
ro::apiResource('/bank-note', BankNoteController::class);
ro::apiResource('/open-shift', OpenShiftController::class);
ro::apiResource('/close-shift', CloseShiftController::class);
