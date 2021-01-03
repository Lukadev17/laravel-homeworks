<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'login'])->name('api.users.login');
Route::post('/register', [\App\Http\Controllers\Api\Auth\AuthController::class, 'register'])->name('api.users.register');

Route::middleware(['auth:api'])->group(function () {
    Route::get('/users', [\App\Http\Controllers\Api\UserController::class, 'index'])->name('api.users.index');
    Route::get('/users/{user}', [\App\Http\Controllers\Api\UserController::class, 'index'])->name('api.users.show');
});
