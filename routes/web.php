<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Site\HomeController::class, 'index'])
    ->name('site.home');
Route::get('/products/{product:slug}', [\App\Http\Controllers\Site\HomeController::class, 'single'])
    ->name('site.single');

Route::prefix('cart')->name('site.cart.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Site\CartController::class, 'index'])->name('index');
    Route::post('/add', [\App\Http\Controllers\Site\CartController::class, 'add'])->name('add');
    Route::delete('/remove/{item}', [\App\Http\Controllers\Site\CartController::class, 'remove'])->name('remove');
    Route::get('/cancel', [\App\Http\Controllers\Site\CartController::class, 'cancel'])->name('cancel');
});

Route::prefix('checkout')->name('site.checkout.')->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\Site\CheckoutController::class, 'index'])->name('index');
    Route::post('/process', [\App\Http\Controllers\Site\CheckoutController::class, 'process'])->name('process');
    Route::get('/thanks/{order}',  [\App\Http\Controllers\Site\CheckoutController::class, 'thanks'])->name('thanks');
});

Route::view('login', 'auth.login')->name('login');
Route::view('register', 'auth.register')->name('register');
Route::post('logout', function (Request $request) {

    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
})->name('logout');

Route::post('login', \App\Http\Controllers\Auth\LoginControllerAction::class)->name('login.store');
Route::post('register', \App\Http\Controllers\Auth\RegisterController::class)
    ->name('register.store');

Route::prefix('manager')->middleware(['auth', 'can:can_access_manager'])->name('manager.')->group(function () {

    Route::delete(
        '/products/{product}/photos/{photo}',
        [\App\Http\Controllers\Manager\ProductPhotoController::class, 'destroy']
    )->name('products.photo.destroy');

    Route::resource('products', \App\Http\Controllers\Manager\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\Manager\CategoryController::class);
});

Route::middleware('auth')->prefix('customers')->name('site.customers.')->group(function () {
    Route::get('my-orders', [\App\Http\Controllers\Customer\MyOrdersController::class, 'index'])->name('my-orders');

    Route::put('my-orders/cancel/{order}', [\App\Http\Controllers\Customer\MyOrdersController::class, 'cancelOrder'])
        ->can('update', 'order')
        ->name('my-orders.cancel');
});
