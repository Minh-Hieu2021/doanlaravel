<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\NhanvienController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\HoaDonNhapController;
use App\Http\Controllers\Admin\ChiTietHoaDonNhapController;
use App\Http\Controllers\Admin\khachhangController;
use App\Http\Controllers\Admin\AdminController;

Route::group(['prefix' => '/'], function () {
    Route::get('login', [Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [Admin\LoginController::class, 'login'])->name('admin.login.post');
    Route::get('logout', [Admin\LoginController::class, 'logout'])->name('admin.logout');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::prefix('/nhanvien')->group(function () {
            Route::get('/', [NhanvienController::class, 'index'])->name('admin.nhanvien');
            Route::get('/create', [NhanvienController::class, 'create'])->name('admin.nhanvien.add');
            Route::post('/create', [NhanvienController::class, 'store'])->name('admin.nhanvien.store');
            Route::get('/update/{id}', [NhanvienController::class, 'edit'])->name('admin.nhanvien.edit');
            Route::put('/update/{id}', [NhanvienController::class, 'update'])->name('admin.nhanvien.update');
            Route::get('/delete/{id}', [NhanvienController::class, 'destroy'])->name('admin.nhanvien.delete');
        });
        Route::prefix('/sanpham')->group(function () {
            Route::get('/', [SanphamController::class, 'index'])->name('admin.sanpham');
            Route::get('/create', [SanphamController::class, 'create'])->name('admin.sanpham.add');
            Route::post('/create', [SanphamController::class, 'store'])->name('admin.sanpham.store');
            Route::get('/update/{id}', [SanphamController::class, 'edit'])->name('admin.sanpham.edit');
            Route::put('/update/{id}', [SanphamController::class, 'update'])->name('admin.sanpham.update');
            Route::get('/delete/{id}', [SanphamController::class, 'destroy'])->name('admin.sanpham.delete');
        });

        Route::prefix('/hoadonnhap')->group(function () {
            Route::get('/', [HoaDonNhapController::class, 'index'])->name('admin.hoadonnhap');
            Route::get('/create', [HoaDonNhapController::class, 'create'])->name('admin.hoadonnhap.add');
            Route::post('/create', [HoaDonNhapController::class, 'store'])->name('admin.hoadonnhap.store');
            Route::get('/update/{id}', [HoaDonNhapController::class, 'edit'])->name('admin.hoadonnhap.edit');
            Route::put('/update/{id}', [HoaDonNhapController::class, 'update'])->name('admin.hoadonnhap.update');
            Route::get('/delete/{id}', [HoaDonNhapController::class, 'destroy'])->name('admin.hoadonnhap.delete');
        });

        Route::prefix('/chitiethoadonnhap')->group(function () {
            Route::get('/', [ChiTietHoaDonNhapController::class, 'index'])->name('admin.chitiethoadonnhap');
            Route::get('/create', [ChiTietHoaDonNhapController::class, 'create'])->name('admin.chitiethoadonnhap.add');
            Route::post('/create', [ChiTietHoaDonNhapController::class, 'store'])->name('admin.chitiethoadonnhap.store');
            Route::get('/update/{id}', [ChiTietHoaDonNhapController::class, 'edit'])->name('admin.chitiethoadonnhap.edit');
            Route::put('/update/{id}', [ChiTietHoaDonNhapController::class, 'update'])->name('admin.chitiethoadonnhap.update');
            Route::get('/delete/{id}', [ChiTietHoaDonNhapController::class, 'destroy'])->name('admin.chitiethoadonnhap.delete');
        });
        Route::prefix('/khachhang')->group(function () {
            Route::get('/', [khachhangController::class, 'index'])->name('admin.khachhang');
            Route::get('/create', [khachhangController::class, 'create'])->name('admin.khachhang.add');
            Route::post('/create', [khachhangController::class, 'store'])->name('admin.khachhang.store');
            Route::get('/update/{id}', [khachhangController::class, 'edit'])->name('admin.khachhang.edit');
            Route::put('/update/{id}', [khachhangController::class, 'update'])->name('admin.khachhang.update');
            Route::get('/delete/{id}', [khachhangController::class, 'destroy'])->name('admin.khachhang.delete');
        });
        Route::prefix('/hoadonnhap')->group(function () { //Thêm mới
            Route::get('/', [HoaDonNhapController::class, 'index'])->name('admin.hoadonnhap');
            Route::get('/create', [HoaDonNhapController::class, 'create'])->name('admin.hoadonnhap.add');
            Route::post('/create', [HoaDonNhapController::class, 'store'])->name('admin.hoadonnhap.store');
            Route::get('/delete/{id}', [HoaDonNhapController::class, 'destroy'])->name('admin.hoadonnhap.delete');
        });

        Route::prefix('/chitiethoadonnhap')->group(function () { //Thêm mới
            Route::get('/', [ChiTietHoaDonNhapController::class, 'index'])->name('admin.chitiethoadonnhap');
            Route::get('/create', [ChiTietHoaDonNhapController::class, 'create'])->name('admin.chitiethoadonnhap.add');
            Route::post('/create', [ChiTietHoaDonNhapController::class, 'store'])->name('admin.chitiethoadonnhap.store');
            Route::get('/delete/{id}', [ChiTietHoaDonNhapController::class, 'destroy'])->name('admin.chitiethoadonnhap.delete');
        });
        Route::prefix('/thongkechitiet')->group(function () {
            Route::get('/doanhthu', [AdminController::class, 'doanhthu'])->name('admin.thongkechitiet.doanhthu');
            Route::get('/doanhso', [AdminController::class, 'doanhso'])->name('admin.thongkechitiet.doanhso');
            Route::get('/topsanpham', [AdminController::class, 'topsanpham'])->name('admin.thongkechitiet.topsanpham');
            Route::get('/tongtienkhachchi', [AdminController::class, 'tongtienkhachchi'])->name('admin.thongkechitiet.tongtienkhachchi');
            Route::get('/danhsachhoadontheokhoangthoigian', [AdminController::class, 'danhsachhoadontheokhoangthoigian'])->name('admin.thongkechitiet.danhsachhoadontheokhoangthoigian');
        });
    });
});
