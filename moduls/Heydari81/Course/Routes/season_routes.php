<?php
use Heydari81\Course\Http\Controllers\CourseController;
Route::group([
    'namespace'=>'Heydari81\Course\Http\Controllers',
    'middleware'=>['web']],function ($router){
    $router->post('seasons/{course}',[\Heydari81\Course\Http\Controllers\SeasonController::class,'store'])->
    name('seasons.store');
    $router->get('seasons/{season}',[\Heydari81\Course\Http\Controllers\SeasonController::class,'edit'])->
    name('seasons.edit');
    $router->delete('seasons/{season}',[\Heydari81\Course\Http\Controllers\SeasonController::class,'destroy'])->
    name('seasons.destroy');
    $router->patch('season/{course}/update',[\Heydari81\Course\Http\Controllers\SeasonController::class,'update'])->name('seasons.update');
    $router->patch('season/{course}/confirmStatus',[\Heydari81\Course\Http\Controllers\SeasonController::class,'updateConfirmStatus'])->name('seasons.updateConfirmStatus');
});
