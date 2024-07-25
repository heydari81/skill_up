<?php
use Heydari81\Course\Http\Controllers\CourseController;
Route::group([
    'namespace'=>'Heydari81\Course\Http\Controllers',
    'middleware'=>['web']],function ($router){
    $router->resource('courses', 'CourseController');
    $router->get('course_details/{id}',[CourseController::class,'details'])->name('course_details');
    $router->get('course_lessons/{id}',[CourseController::class,'lesson_index'])->name('courses.lessons');
    $router->patch('courses/{course}/confirmStatus',[CourseController::class,'updateConfirmStatus'])->name('courses.updateConfirmStatus');
    $router->post('course/{course}/buy',[CourseController::class,'buy'])->name('courses.buy');
    $router->patch('courses/{course}/confirmLock',[CourseController::class,'updateLock'])->name('courses.lock');
    $router->post('courses/filtered',[CourseController::class,'filtered_course'])->name('filtered.courses');

});

