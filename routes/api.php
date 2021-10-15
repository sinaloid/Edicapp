<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiDataCommuneController;
use App\Http\Controllers\Auth\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('v1', ApiDataCommuneController::class);

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login'])->name('api_login');
    Route::post('register', [AuthController::class, 'api_register']);
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [AuthController::class, 'api_logout']);
        Route::get('user', [AuthController::class, 'api_user']);
    });
});
Route::get('datas/info/{slug?}', [SiteUrl::class, 'datasInfo'])->name('datas.info');