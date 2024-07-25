<?php

use Heydari81\RolePermissions\Http\Controllers\RolePermissionsController;
Route::group([
    'namespace'=>'Heydari81\Category\Http\\RolePermissions',
    'middleware'=>['web']],function ($router){
    $router->get('/role',function (){
        $user = auth()->user();
        $user->assignRole('teacher');
    });
});
