<?php

use App\Http\Controllers\Site\Category\AutomotiveController;
use App\Http\Controllers\Site\Category\CultureController;
use App\Http\Controllers\Site\Category\EntertainmentController;
use App\Http\Controllers\Site\Category\FinanceController;
use App\Http\Controllers\Site\Category\PoliticController;
use App\Http\Controllers\Site\Category\SportController;
use App\Http\Controllers\Site\Category\TechnologyController;

use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'site.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/sobre-mim', [HomeController::class, 'about'])->name('about');
    Route::get('/categorias/{slug}', [HomeController::class, 'showPosts'])->name('posts');
    Route::get('/post/{slug}', [HomeController::class, 'detailPost'])->name('post');
});
