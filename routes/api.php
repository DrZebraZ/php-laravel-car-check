<?php

use App\Http\Controllers\Api\{CarsController, UserController, ChecksController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/users', UserController::class);
Route::apiResource('/cars', CarsController::class);
Route::apiResource('/checks', ChecksController::class);
