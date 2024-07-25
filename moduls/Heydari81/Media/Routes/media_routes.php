<?php
use Heydari81\Media\Http\Controllers\MediaController;
Route::group([
    'namespace'=>'Heydari81\Media\Http\Controllers',
    'middleware'=>['web']],function ($router){
    $router->get('/media/{media}/download',[MediaController::class,'download'])->name('media.download');
});
