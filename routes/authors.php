<?php

//use App\Http\Controllers\Admin\CategoryController;
//use App\Http\Controllers\Front\HomeController as FrontHomeController;
//use App\Http\Controllers\Admin\DashboardController as DashboardController;
//use App\Http\Controllers\Admin\BlogController as BlogController;
//use App\Http\Controllers\LoginController;
//use Illuminate\Support\Facades\Route;

//Route::get('dashboard', [DashboardController::class, 'index'])->name('pages.dashboard');
//Route:: prefix('blog')->name('blog.')->group(function () {
//    Route:: get('/', [BlogController::class, 'index'])->name('index');
//    Route:: get('/create', [BlogController::class, 'create'])->name('create');
//    Route:: post('/create', [BlogController::class, 'store'])->name('store');
//    Route:: get('/edit/{blog}', [BlogController::class, 'edit'])->name('edit');
//    Route:: put('/edit/{blog}', [BlogController::class, 'update'])->name('update');
//    Route:: delete('/delete/{blog}', [BlogController::class, 'destroy'])->name('delete');
////        Route:: get('/edit/{id}', [BlogController::class, 'editID'])->name('edit.id');
////        Route:: put('/edit/{blog}', [BlogController::class, 'updateID'])->name('update.id');
////        Route:: delete('/delete/{blog}', [BlogController::class, 'destroyID'])->name('delete.id');
//});
//Route:: resource('category', CategoryController::class);
