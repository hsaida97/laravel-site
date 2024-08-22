<?php

use App\Http\Controllers\Front\HomeController as FrontHomeController;
use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\BlogController as BlogController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontHomeController::class, 'index'])->name('front.index');
Route::get('/about', [FrontHomeController::class, 'about'])->name('front.about');
Route::get('/services', [FrontHomeController::class, 'services'])->name('front.services');
Route::get('/portfolio', [FrontHomeController::class, 'portfolio'])->name('front.portfolio');
Route::get('/blogs', [FrontHomeController::class, 'blogs'])->name('front.blogs');
Route::get('/contact', [FrontHomeController::class, 'contact'])->name('front.contact');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route:: prefix('blog')->name('blog.')->group(function () {
        Route:: get('/', [BlogController::class, 'index'])->name('blog');
    });
});




