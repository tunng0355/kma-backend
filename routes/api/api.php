<?php

// Route::apiResource('task', 'Api\TaskController')->only([
//     'index','show',
// ])->middleware('cors');


Route::prefix('admin')->group(function () {

    //Auth controller
    Route::post('login', 'AuthController@login');

    Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::middleware(['admin.level'])->group(function () {

            //Auth controller
            Route::get('auth', 'AuthController@user');
            Route::post('change_password', 'AuthController@changePassword');
            Route::post('logout', 'AuthController@logout');

            //Socket controller
//            Route::post('sendmessage', 'API\ChatController');

            //Chat controller
            Route::apiResource('chat', 'API\ChatController');
        });
    });
});

Route::prefix('user')->group(function () {

    Route::post('signup', 'AuthController@register');
    Route::get('user_empty', 'AuthController@checkEmptyRegister');
    //Email controller
    Route::get('contact_mail', 'EmailController@sendEMail');

});
