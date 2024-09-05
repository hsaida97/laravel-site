<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\HomeController ;
use App\Http\Controllers\Admin\DashboardController ;
use App\Http\Controllers\Admin\BlogController ;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','checkAdmin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('pages.dashboard');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('pages.dashboard');

    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/create', [BlogController::class, 'store'])->name('store');
        Route::get('/edit/{blog}', [BlogController::class, 'edit'])->name('edit');
        Route::put('/edit/{blog}', [BlogController::class, 'update'])->name('update');
        Route::delete('/delete/{blog}', [BlogController::class, 'destroy'])->name('delete');
    });

    Route::resource('category', CategoryController::class);
});
