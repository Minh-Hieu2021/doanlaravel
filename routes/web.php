<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('user.home.index');
// })->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['prefix' => '/cart'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('user.login');
    Route::post('login', [LoginController::class, 'login'])->name('user.login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');
    Route::group(['middleware' => ['auth:user']], function () {
        Route::get('/', [HomeController::class, 'cart'])->name('cart');
        Route::get('/addCart/{sp}/{sl?}', [HomeController::class, 'addCart'])->name('addCart');
        Route::post('/addCartQuantity/{sp}', [HomeController::class, 'addCartQuantity'])->name('addCartQuantity');
        Route::post('/addInvoice', [HomeController::class, 'addInvoice'])->name('addInvoice');
        Route::get('/showformnhapthongtinhoadon', [HomeController::class, 'showformnhapthongtinhoadon'])->name('showformnhapthongtinhoadon');
    });
});

Route::get('/productdetail', function () {
    return view('user.home.productdetail');
});
Route::get('/product', function () {
    return view('user.home.product');
})->name('product');
Route::get('/product/{id}', [HomeController::class, 'productdetail'])->name('productdetail');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
