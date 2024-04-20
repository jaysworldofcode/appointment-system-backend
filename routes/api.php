<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\AppointmentsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::prefix('patients')->middleware('auth:api')->group(function () {
    Route::get('/{id}', [PatientsController::class, 'show']);
    Route::delete('/{id}', [PatientsController::class, 'delete']);
    Route::post('/', [PatientsController::class, 'store']);
    Route::put('/{id}/{status_id}', [PatientsController::class, 'setStatus']);
    Route::put('/', [PatientsController::class, 'update']);
});

Route::prefix('appointments')->middleware('auth:api')->group(function () {
    Route::post('/', [AppointmentsController::class, 'store']);
    Route::get('/{id}', [AppointmentsController::class, 'show']);
});