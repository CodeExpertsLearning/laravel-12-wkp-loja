<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{product:slug}', [\App\Http\Controllers\HelloController::class, 'hello']);


Route::view('login', 'auth.login')->name('login');

Route::get('logout', function () {

    auth()->logout();
    return redirect()->route('login');
})->name('logout');

Route::post('login', \App\Http\Controllers\Auth\LoginControllerAction::class)->name('login.store');

Route::prefix('manager')->middleware('auth')->name('manager.')->group(function () {

    Route::delete(
        '/products/{product}/photos/{photo}',
        [\App\Http\Controllers\Manager\ProductPhotoController::class, 'destroy']
    )->name('products.photo.destroy');

    Route::resource('products', \App\Http\Controllers\Manager\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\Manager\CategoryController::class);
});
