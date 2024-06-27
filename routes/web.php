<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;




Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();


Route::group(['middleware' => ['auth']], function () {
Route::get('posts',[PostController::class, 'index'])->name('Post.index');
Route::post('posts/store',[PostController::class,'store'])->name('Post.store');
Route::get('posts/{id}/edit/', [PostController::class, 'edit'])->name('Post.edit');
Route::put('posts/{id}/edit/', [PostController::class, 'update'])->name('Post.edit');
Route::get('posts/{id}/delete/', [PostController::class, 'destroy'])->name('Post.delete');
Route::post('/posts/{post}/comments', [PostCommentController::class,'store'])->name('comments.store');



Route::post('posts/like/{post}/{user}', [PostLikeController::class, 'toggleLike'])->name('Post.likes');
});


