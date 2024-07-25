<?php
use Heydari81\Course\Http\Controllers\CourseController;
Route::group([
    'namespace'=>'Heydari81\Course\Http\Controllers',
    'middleware'=>['web']],function ($router){
    $router->post('lesson/{course}',[\Heydari81\Course\Http\Controllers\LessonController::class,'store'])->
    name('lessons.store');
    $router->get('lesson/{lesson}/edit',[\Heydari81\Course\Http\Controllers\LessonController::class,'edit'])->
    name('lesson.edit');
    $router->patch('lesson/{lesson}/edit',[\Heydari81\Course\Http\Controllers\LessonController::class,'update'])->
    name('lessons.update');
    $router->delete('lesson/{lesson}',[\Heydari81\Course\Http\Controllers\LessonController::class,'destroy'])->
    name('lesson.destroy');
    $router->patch('season/{course}/update',[\Heydari81\Course\Http\Controllers\SeasonController::class,'update'])->name('seasons.update');
    $router->patch('season/{course}/confirmStatus',[\Heydari81\Course\Http\Controllers\SeasonController::class,'updateConfirmStatus'])->name('seasons.updateConfirmStatus');
});
