<?php

use App\Http\Controllers\FrontHomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('/front')->name('front.')->group(function () {

    Route::get('/', FrontHomeController::class)->middleware('auth')->name('index');
    Route::view('/login', 'front.auth.login');
    Route::view('/register', 'front.auth.register');
    Route::view('/forgot-password', 'front.auth.forgot-password');

});


/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
require __DIR__ . '/auth.php';
