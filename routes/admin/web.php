<?php

use App\Http\Controllers\Admin\Blog\CategoryController;
use App\Http\Controllers\Admin\Blog\DashboardController;
use App\Http\Controllers\Admin\Blog\PostController;
use App\Http\Controllers\Admin\Blog\UserController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('login', [LoginController::class, 'show'])->name('login');
    Route::post('login-do', [LoginController::class, 'login'])->name('login.do')->middleware('throttle:5,1');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('usuarios', [UserController::class, 'index'])->name('users.index')->can('create', User::class);

        Route::group(['as' => 'blog.', 'prefix' => 'blog'], function() {
            Route::resource('posts', PostController::class)->except(['show','update']);
            Route::resource('categories', CategoryController::class)->except(['show']);


            Route::get('posts/{id}/{slug}', [PostController::class, 'show'])->name('posts.show');
            Route::put('posts/{id}/publish', [PostController::class, 'publish'])->name('posts.publish');
            Route::post('update-post/{id}', [PostController::class, 'update'])->name('posts.update');
        });
    });
});
