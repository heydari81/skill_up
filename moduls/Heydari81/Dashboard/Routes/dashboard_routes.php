<?php

use Heydari81\Dashboard\Http\Controllers\DashboardController;
Route::group([
    'namespace'=>'Heydari81\Dashboard\Http\Controllers',
    'middleware'=>['web','auth','verified']],function ($router){
    $router->get('dashboard', [DashboardController::class,'index'])->name('dashboard');

});
