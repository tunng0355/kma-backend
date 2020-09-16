<?php

// Route::apiResource('task', 'Api\TaskController')->only([
//     'index','show',
// ])->middleware('cors');


Route::prefix('admin')->group(function () {


    Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');
    Route::group(['middleware' => 'jwt.auth'], function () {

        Route::middleware(['admin.level'])->group(function () {

            //Auth controller
            Route::get('auth', 'AuthController@user');
            Route::post('change_password', 'AuthController@changePassword');
            //Socket controller
//            Route::post('sendmessage', 'API\ChatController');

        });
    });
});

Route::prefix('user')->group(function () {
    //user
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@register');
    Route::get('user_empty', 'AuthController@checkEmptyRegister');
    Route::post('confirm_code', 'AuthController@confirmSendCode');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('logout', 'AuthController@logout');
        Route::get('my_feed', 'API\PostController@myNewFeed');
        Route::apiResource('post', 'API\PostController');
        //Chat controller
        Route::apiResource('chat', 'API\ChatController');
    });
    //Email controller
    Route::get('contact_mail', 'EmailController@sendEMail');
});
