<?php

use App\Http\Controllers\UserWelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;



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

Route::get('/',[UserWelcomeController ::class, 'welcome'])->name('welcome');



Route::get('/signup', [SignupController::class, 'show'])->name('signup.show');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup.post');



Route::get('login',[LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');



Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('settings', [SettingsController::class, 'view'])->name('settings.get');
    Route::post('settings', [SettingsController::class, 'update'])->name('settings.post');
});

    
Route::post('/logout', [LoginController::class,'logout'])->name('logout');