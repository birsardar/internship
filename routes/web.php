<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserHasDetialController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['verify' => false]);


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('login/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

// Use 'admin.home' as the unique name for the admin home route
Route::middleware('auth', 'admin')->prefix('admin')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    Route::resource('/', AdminController::class);
    Route::resource('/managers', ManagerController::class);
    Route::get('mangers/is_active/{id}', [ManagerController::class, 'isActive'])->name('managers.is_active');
});

// Use 'manager.home' as the unique name for the manager home route
Route::middleware('auth', 'manager')->prefix('manager')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('manager.home');
});

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::resource('userdetail', UserHasDetialController::class);
});
