<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\HomeController as FrontHomeController;
use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\BlogController as BlogController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontHomeController::class, 'index'])->name('front.index');
Route::get('/about', [FrontHomeController::class, 'about'])->name('front.about');
Route::get('/services', [FrontHomeController::class, 'services'])->name('front.services');
Route::get('/portfolio', [FrontHomeController::class, 'portfolio'])->name('front.portfolio');
Route::get('/blogs', [FrontHomeController::class, 'blogs'])->name('front.blogs');
Route::get('/contact', [FrontHomeController::class, 'contact'])->name('front.contact');

Route:: middleware('guest')->get('/login', function () {
    auth()->logout();
    return view('login.index');
});
Route:: post('/login', [LoginController::class, 'login'])->name('login');

//Auth::routes(); (Hazır template login)
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
