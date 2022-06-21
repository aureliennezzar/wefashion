<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

//ROUTES


//Home route (returning all products)
Route::get('/',[ProductController::class,'index'])->name('products.index');

//Single product
Route::get('/products/{id}', [ProductController::class,'show'])-> name('products.show');

//CRUD routes

//Prefix added to make sure the URI start with "admin"
//Name added to make sure that we point to the right template
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){
    Route::resource('products', '\App\Http\Controllers\Admin\ProductController');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
