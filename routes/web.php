<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {
    return view('layout.admin');
});

Route::get('admin/products/create', function () {
    return view('admin.products.create');
});
