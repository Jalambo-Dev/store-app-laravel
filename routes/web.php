<?php

use App\Http\Controllers\CategroyController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', [ProductController::class, 'index']);

Route::get('products/{id}', [ProductController::class, 'edit']);

Route::get('products/delete/{id}', [ProductController::class, 'delete']);


Route::get('categories', [CategroyController::class, 'index']);

Route::get('categories/delete/{id}', [CategroyController::class, 'delete']);