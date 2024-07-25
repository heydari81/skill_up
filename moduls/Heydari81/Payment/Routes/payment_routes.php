<?php
use Heydari81\Payment\Http\Controllers\PaymentController;
Route::group([
    'namespace'=>'Heydari81\Payment\Http\Controllers',
    'middleware'=>['web','auth','verified']],function ($router){
    $router->any('/payment/callback',[PaymentController::class,'callback'])->name('payments.callback');
    $router->get('/payment/list',[PaymentController::class,'list'])->name('payments.list');
});
