<?php

use App\Http\Controllers\FuelSensorController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Middleware\CheckClientHasApiToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(CheckClientHasApiToken::class)->group(function (){
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::post('users', [UserController::class, 'store']);
    Route::post('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);


    Route::get('organizations', [OrganizationController::class, 'index']);
    Route::get('organizations/{id}', [OrganizationController::class, 'show']);
    Route::post('organizations', [OrganizationController::class, 'store']);
    Route::post('organizations/{id}', [OrganizationController::class, 'update']);
    Route::delete('organizations/{id}', [OrganizationController::class, 'destroy']);

    Route::get('vehicles', [VehicleController::class, 'index']);
    Route::get('vehicles/{id}', [VehicleController::class, 'show']);
    Route::post('vehicles', [VehicleController::class, 'store']);
    Route::post('vehicles/{id}', [VehicleController::class, 'update']);
    Route::delete('vehicles/{id}', [VehicleController::class, 'destroy']);

    Route::get('fuelSensors', [FuelSensorController::class, 'index']);
    Route::get('fuelSensors/{id}', [FuelSensorController::class, 'show']);
    Route::post('fuelSensors', [FuelSensorController::class, 'store']);
    Route::post('fuelSensors/{id}', [FuelSensorController::class, 'update']);
    Route::delete('fuelSensors/{id}', [FuelSensorController::class, 'destroy']);
});

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
