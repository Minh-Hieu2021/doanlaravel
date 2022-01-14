<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\NhanvienController;

Route::group(['prefix' => '/'], function () {
    Route::get('login', [Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [Admin\LoginController::class, 'login'])->name('admin.login.post');
    Route::get('logout', [Admin\LoginController::class, 'logout'])->name('admin.logout');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');
        Route::prefix('/nhanvien')->group(function () {
            Route::get('/', [NhanvienController::class, 'index'])->name('admin.nhanvien');
            Route::get('/create', [NhanvienController::class, 'create'])->name('admin.nhanvien.add');
            Route::post('/create', [NhanvienController::class, 'store'])->name('admin.nhanvien.store');
            Route::get('/update/{id}', [NhanvienController::class, 'edit'])->name('admin.nhanvien.edit');
            Route::put('/update/{id}', [NhanvienController::class, 'update'])->name('admin.nhanvien.update');
            Route::get('/delete/{id}', [NhanvienController::class, 'destroy'])->name('admin.nhanvien.delete');
        });
    });
});
