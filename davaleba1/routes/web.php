<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cars', [\App\Http\Controllers\CarController::class, 'getCars'])->name('cars');

Route::get('/cars/create', [\App\Http\Controllers\CarController::class, 'getCreateCar'])->name('cars.create');

Route::post('/cars', [\App\Http\Controllers\CarController::class, 'saveCar'])->name('cars.save');

Route::get('/cars/{id}/edit', [\App\Http\Controllers\CarController::class, 'getEditCar'])->name('cars.edit');

Route::put('/cars/{id}', [\App\Http\Controllers\CarController::class, 'updateCar'])->name('cars.update');

Route::delete('/cars/{car}', [\App\Http\Controllers\CarController::class, 'deleteCar'])->name('cars.delete');

Route::get('/cars/{id}', [\App\Http\Controllers\CarController::class, 'getCar'])->name('cars.phone');
