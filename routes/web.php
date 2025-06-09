<?php

use App\Http\Controllers\AssignValueController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddlware;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin.only'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('assign', AssignValueController::class);
});
Route::get('assign_value/{id}', [AssignValueController::class, 'showAssignedValue'])
    ->middleware(['auth', 'client.only'])
    ->name('view.value');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
