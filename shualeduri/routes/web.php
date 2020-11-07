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

Route::get('/', [\App\Http\Controllers\ApplicantController::class, 'getAllApplicants'])->name('allApplicants');//HTML shi viyenebt

Route::get('/applicants/{id}/edit', [\App\Http\Controllers\ApplicantController::class, 'getApplicantEdit'])->name('applicants.edit');

Route::put('/applicants/{id}', [\App\Http\Controllers\ApplicantController::class, 'editApplicant'])->name('applicant.edit');


Route::get('/applicants/{applicant}/hired', [\App\Http\Controllers\ApplicantController::class, 'hired'])->name('applicant.hired');
