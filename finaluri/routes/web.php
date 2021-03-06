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


Route::middleware("cancel.auth")->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('welcome');

    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'getLogin'])->name('login');

    Route::post('/post_login', [\App\Http\Controllers\LoginController::class, 'login'])->name('post_login');

    Route::get('/register', [\App\Http\Controllers\LoginController::class, 'getRegister'])->name('register');

    Route::post('/post_register', [\App\Http\Controllers\LoginController::class, 'register'])->name('post_register');

});
Route::middleware('auth')->group( function () {
    Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');

    Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('createPost');

    Route::post('/posts/save', [\App\Http\Controllers\PostController::class, 'save'])->name('savePost');

    Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('getPost');

    Route::get('/posts/{id}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('editPost');

    Route::put('/posts/{id}/update', [\App\Http\Controllers\PostController::class, 'update'])->name('updatePost');

    Route::delete('/posts/{post}/delete', [\App\Http\Controllers\PostController::class, 'delete'])->name('deletePost');

    Route::get('/my_posts', [\App\Http\Controllers\PostController::class, 'myPosts'])->name('myposts');

    Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

    Route::post('/posts/{post}/comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('post_comment');

    Route::delete('/comments/{comment}', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('delete_comment');

});
