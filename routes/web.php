<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

if (!function_exists('set_active')) {
    function set_active($route)
    {
        if (is_array($route)) {
            return in_array(Request::path(), $route) ? 'active' : '';
        }

        return Request::path() == $route ? 'active' : '';
    }
}



Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login.show');
});


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/{category}/products', 'products')->name('products.category');
    Route::get('/products/{product}', 'productDetails')->name('product.details');
    Route::get('/checkout', 'checkout')->name('checkout');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
});


Route::group( ['prefix' => 'admin'],function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
        });
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'index')->name('profile');
        });


        Route::controller(OrderController::class)->group(function () {
            Route::get('/orders', 'orders')->name('orders');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/{category}', 'index')->name('products');
            Route::get('/products/{category}/create', 'create')->name('products.create');
        });


    }
);
