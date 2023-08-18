<?php

// Controllers

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
// Packages
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

// Route::get('/storage', function () {
//     Artisan::call('storage:link');
// });

//UI Pages Routs
Route::get('/permohonan', [ApplicationController::class, 'create'])->name('application');
Route::post('/permohonan', [ApplicationController::class, 'store'])->name('store.application');

Route::group(['middleware' => 'auth'], function () {
    // Dashboard Routes
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Permohonan Surat
    Route::post('/print/{id}', [ApplicationController::class, 'print'])->name('print.application');
    Route::post('/delete-application/{id}', [ApplicationController::class, 'destroy'])->name('delete.application');

    // Users Module
    Route::get('/profile', [UserController::class, 'show'])->name('profile');
    Route::post('/profile', [UserController::class, 'update'])->name('update.profile');
    Route::post('/update-password', [UpdatePasswordController::class, 'update'])->name('update.password');
});

