<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DessertController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

// Landing Page
Route::get('/', function () {
    $desserts = \App\Models\Dessert::all();
    return view('welcome', compact('desserts'));
})->name('landing');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('desserts/export-pdf', [DessertController::class, 'exportPdf'])->name('admin.desserts.export-pdf');
    Route::resource('desserts', DessertController::class)->names('admin.desserts');
    Route::resource('transactions', TransactionController::class)->names('admin.transactions');
    Route::resource('users', UserController::class)->names('admin.users');
});
