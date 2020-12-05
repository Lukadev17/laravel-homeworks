<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
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

Route::get("/questions", [QuestionController::class, "index"])->name("questions.all")->middleware(IsAdmin::class);;

Route::get("/questions/create", [QuestionController::class, "create"])->name("questions.create")->middleware(IsAdmin::class);

Route::post('/questions/save', [QuestionController::class, 'save'])->name('questions.save')->middleware('auth');


Route::get('/quiz', [QuizController::class, 'index'])->name('quiz')->middleware('auth');

Route::post('/quiz/save', [QuizController::class, 'save'])->name('quiz.save')->middleware('auth');


Route::post("/users/post-login", [LoginController::class, "postLogin"])->name("post.login");

Route::get("/users/login", [LoginController::class, "login"])->name("login");

Route::post("/users/logout", [LoginController::class, "logout"])->name("logout")->middleware('auth');
