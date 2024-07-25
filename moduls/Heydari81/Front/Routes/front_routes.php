<?php
Route::group([
    'namespace'=>'Heydari81\Front\Http\Controllers',
    'middleware'=>['web']],
    function ($router){
    $router->get('/',[Heydari81\Front\Http\Controllers\FrontController::class,'index'])->name('home');
    $router->get('/all_course',[Heydari81\Front\Http\Controllers\FrontController::class,'all_course'])->name('all_course');
    $router->get('/c-{slug}',[Heydari81\Front\Http\Controllers\FrontController::class,'single_course'])->name('single_course');

    });
