<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Root route - redirect based on auth status
Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('verification.notice');
        }
    }
    return app(LandingController::class)->index();
});

// Landing page (direct access)
Route::get('/landing', [LandingController::class, 'index'])->name('landing');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
    
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Email Verification Routes
Route::middleware('auth')->group(function () {
    // Email verification notice
    Route::get('/email/verify', function (Request $request) {
        // Auto send verification email when page loads
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        }
        
        $request->user()->sendEmailVerificationNotification();
        return view('auth.verify-email')->with('message', 'Verification email sent to your address!');
    })->middleware(['throttle:3,1'])->name('verification.notice');
    
    // Email verification handler
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/dashboard')->with('status', 'Your email has been verified!');
    })->middleware(['signed'])->name('verification.verify');
    
    // Resend verification email
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');
});

// Protected routes  
Route::middleware(['auth', 'verified.email'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Account routes
    Route::get('/profile', [AccountController::class, 'profile'])->name('profile');
    Route::put('/profile', [AccountController::class, 'updateProfile'])->name('profile.update');
    
    Route::get('/change-password', [AccountController::class, 'showChangePassword'])->name('password.change');
    Route::put('/change-password', [AccountController::class, 'changePassword'])->name('password.change.update');
});
