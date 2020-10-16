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
        //AUTH
        Route::post('logout', 'AuthController@logout');

        //POST
        Route::get('my_feed', 'API\PostController@myNewFeed');
        Route::apiResource('post', 'API\PostController');

        //ChatController
        Route::apiResource('chat', 'API\ChatController');
        Route::get('list_chat', 'API\ChatController@getListChat');

        //UserController
        Route::get('list_friends', 'UserController@getListFriends');
        Route::get('get_user_detail', 'UserController@getUserDetail');
        Route::get('get_user_dashboard', 'UserController@getUserDashBoard');
        Route::get('get_friends_detail', 'UserController@getListFriendsDetail');

        //SubjectController
        Route::get('list_subject', 'SubjectController@getListSubject');

        //LikeController
        Route::put('handle_like', 'LikeController@handleLikeNewFeed');

        //CommentController
        Route::get('list_comment', 'CommentController@getListCommentPost');
        Route::post('add_comment', 'CommentController@addNewCommentPost');

        //SearchController
        Route::get('list_search', 'SearchController@getListSearch');
        Route::post('handle_search', 'SearchController@handleSearch');
    });

    //Email controller
    Route::get('contact_mail', 'EmailController@sendEMail');
});
