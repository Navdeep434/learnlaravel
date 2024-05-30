<?php


use App\Http\Controllers\AdminWelcomeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminSettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminAuthSignupController;
use App\Http\Controllers\ItemController;

// use App\Http\Controllers\ItemController;



    Route::get('/', [AdminWelcomeController::class, 'welcome'])->name('welcome');



    Route::get('signup', [AdminAuthSignupController ::class, 'showSignupForm'])->name('signup');
    Route::post('signup', [AdminAuthSignupController ::class, 'signup'])->name('signup.post');
    
    
   
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout'); 
    

    // Route::get('dashboard', [AdminDashboardController::class,'index'])->name('dashboard');
    // Route::get('settings', [AdminSettingsController::class, 'view'])->name('settings.get');
    // Route::post('settings', [AdminSettingsController::class, 'update'])->name('settings.post');

    
    Route::middleware('admin')->group(function () {
        // Your admin routes here
        Route::get('dashboard', [AdminDashboardController::class,'index'])->name('dashboard');

        Route::post('/save-item', [ItemController::class, 'saveItem'])->name('save-item');

        Route::get('settings', [AdminSettingsController::class, 'view'])->name('settings.get');

        Route::post('settings', [AdminSettingsController::class, 'update'])->name('settings.post');
    });

