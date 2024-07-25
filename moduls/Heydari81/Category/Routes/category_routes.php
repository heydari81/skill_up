<?php

use Heydari81\Category\Http\Controllers\CategoryController;
Route::group([
    'namespace'=>'Heydari81\Category\Http\Controllers',
    'middleware'=>['web']],function ($router){
    $router->resource('categories', 'CategoryController');
});
