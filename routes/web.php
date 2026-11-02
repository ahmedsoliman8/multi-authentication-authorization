<?php

use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\BackHomeController;
use App\Http\Controllers\Back\RoleController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\FrontHomeController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
Route::prefix('/front')->name('front.')->group(function () {

    Route::get('/', FrontHomeController::class)->middleware('auth')->name('index');


});


Route::prefix('/back')->name('back.')->group(function () {

    require __DIR__ . '/adminAuth.php';
    Route::middleware('admin')->group(function () {
        Route::get('/', BackHomeController::class)->name('index');
        Route::resource('admins', AdminController::class);
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);

    });


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

