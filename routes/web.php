<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{product:slug}', [\App\Http\Controllers\HelloController::class, 'hello']);

Route::prefix('manager')->name('manager.')->group(function () {

    // Route::prefix('products')
    //     ->name('products.')
    //     ->controller(\App\Http\Controllers\Manager\ProductController::class)
    //     ->group(function () {

    //         Route::get('/', 'index')->name('index');
    //         Route::get('/create', 'create')->name('create');
    //         Route::post('/store', 'store')->name('store');

    //         Route::get('/{product}/edit', 'edit')->name('edit');
    //         Route::put('/{product}', 'update')->name('update');

    //         Route::delete('/{product}', 'destroy')->name('destroy');
    //     });

    Route::resource('products', \App\Http\Controllers\Manager\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\Manager\CategoryController::class);
});
