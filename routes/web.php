<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::get('home', [App\Http\Controllers\CurrentPostController::class, 'index'])->name('admin.home');

Route::get('posts/create', [App\Http\Controllers\CurrentPostController::class, 'create'])->name('posts.create');
Route::post('posts', [App\Http\Controllers\CurrentPostController::class, 'store'])->name('posts.store');
Route::delete('posts/{post}', [App\Http\Controllers\CurrentPostController::class, 'destroy'])->name('posts.destroy');
Route::post('comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
