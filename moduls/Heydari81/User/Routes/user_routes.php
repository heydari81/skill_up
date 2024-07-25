<?php

use Heydari81\User\Http\Controllers\Auth\AuthenticatedSessionController;
use Heydari81\User\Http\Controllers\Auth\ConfirmablePasswordController;
use Heydari81\User\Http\Controllers\Auth\EmailVerificationNotificationController;
use Heydari81\User\Http\Controllers\Auth\EmailVerificationPromptController;
use Heydari81\User\Http\Controllers\Auth\NewPasswordController;
use Heydari81\User\Http\Controllers\Auth\PasswordController;
use Heydari81\User\Http\Controllers\Auth\PasswordResetLinkController;
use Heydari81\User\Http\Controllers\Auth\RegisteredUserController;
use Heydari81\User\Http\Controllers\Auth\VerifyEmailController;

Route::group([
    'namespace'=>'Heydari81\User\Http\Controllers\Auth',
    'middleware'=>['web','guest']],function ($router){
    $router->get('register', [RegisteredUserController::class, 'create'])->name('register');

    $router->post('register', [RegisteredUserController::class, 'store']);

    $router->get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

    $router->post('login', [AuthenticatedSessionController::class, 'store']);

    $router->get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

    $router->post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    $router->get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');

    $router->post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});
Route::group([
    'namespace'=>'Heydari81\User\Http\Controllers\Auth',
    'middleware'=>['web','auth']],function ($router){
    $router->get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');

    $router->get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    $router->post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    $router->get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');

    $router->post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    $router->put('password', [PasswordController::class, 'update'])->name('password.update');

    $router->any('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
Route::group([
    'namespace'=>'Heydari81\User\Http\Controllers',
    'middleware'=>['web','auth','verified']],function ($router){
    $router->resource('users', 'UserController');
    $router->get('user_front/{id}', [\Heydari81\User\Http\Controllers\UserController::class, 'user_front'])->name('user_front');
    $router->get('addstudent/', [\Heydari81\User\Http\Controllers\UserController::class, 'addstudent_view'])->name('addstudent');
    $router->post('addstudent/', [\Heydari81\User\Http\Controllers\UserController::class, 'addstudent_post'])->name('addstudent');
    $router->post('updateProfile/', [\Heydari81\User\Http\Controllers\UserController::class, 'updateProfile'])->name('updateProfile');
});
