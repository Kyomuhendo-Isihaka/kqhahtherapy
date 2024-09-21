<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PricingController;
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
    Route::get('/login', 'index')->name('login');
    Route::post('/admin-login', 'login')->name('admin.login');
    Route::post('/logout', 'logout')->name('logout');
});


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/{category}/products', 'products')->name('products.category');
    Route::get('/products/{product}', 'productDetails')->name('product.details');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/scan-code/{orderId}', 'scanCode')->name('scanCode');
    Route::get('/thankyou', 'thankyou')->name('thankyou');

});

Route::post('/order/create', [OrderController::class, 'store'])->name('order.store');
Route::post('/save-transaction-id', [OrderController::class, 'storeTransactionID'])->name('customer.transactionID');

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::post('/add-to-cart', 'store')->name('cart.store');
    Route::post('/reduce-cart','reduceFromCart')->name('cart.reduce');
    Route::get('/cart/delete/{product_id}/{user_id}','deleteFromCart')->name('cart.delete');
});


Route::group( ['prefix' => 'admin', 'middleware'=>['auth']],function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
        });
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'index')->name('profile');
            Route::post('/update-profile','update')->name('profile.update');

        });


        Route::get('/orders',[OrderController::class, 'orders'])->name('orders');
        Route::get('/orders/{id}',[OrderController::class, 'orderDetails'])->name('orders.details');
        Route::patch('/orders/update/{order}', [OrderController::class, 'update'])->name('orders.update');



        Route::controller(PricingController::class)->group(function(){
            Route::post('/pricing', 'store')->name('pricing.store');
            Route::put('/update-pricing/{id}', 'update')->name('pricing.update');
            Route::delete('/delete-pricing/{id}', 'destroy')->name('pricing.destroy');

        });
        Route::controller(ProductController::class)->group(function () {
            Route::get('/{category}', 'index')->name('products');
            Route::get('/products/{category}/create', 'create')->name('products.create');
            Route::post('/product/store', 'store')->name('product.store');
            Route::get('/products/{category}/edit/{id}', 'edit')->name('products.edit');
            Route::put('/products/{id}', 'update')->name('product.update');
            Route::delete('/delete-product/{id}', 'destroy')->name('product.destroy');

        });


    }
);
