<?php


use App\Http\Controllers\Admin\AdminController;
// use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;

Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => 'guest:admin'], function(){
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('login',[LoginController::class, 'login'])->name('admin.login');
    });
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');       
        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});