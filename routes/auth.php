<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('/appPrueba/register', [RegisteredUserController::class, 'store']);

    Route::get('/appPrueba/login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('/appPrueba/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/appPrueba/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('/appPrueba/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('/appPrueba/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('/appPrueba/reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/appPrueba/lverify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('/appPrueba/lverify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('/appPrueba/lemail/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('/appPrueba/lconfirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('/appPrueba/lconfirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('/appPrueba/lpassword', [PasswordController::class, 'update'])->name('password.update');

    Route::post('/appPrueba/llogout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
