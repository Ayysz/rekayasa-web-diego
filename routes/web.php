<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DessertController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('desserts', DessertController::class);
