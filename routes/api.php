<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1', 'namespace' => 'Api', 'as' => 'api.'], function ($router) {
    $router->apiResource('blog', 'BlogController');

    $router->post('like', 'LikesController@Liked');

    $router->post('unlike', 'LikesController@UnLiked');

    $router->apiResource('question', 'QuestionController');

    $router->apiResource('category', 'CategoryController');

    $router->get('question/category/{category}', 'CategoryController@questionByCategory');

    $router->get('reply/question/{question}', 'ReplyController@getReplyByQuestionSlug');

    $router->post('comment/question/{id}', 'ReplyController@setReplyByQuestionSlug');


});

Route::group([

    'middleware' => 'api',
    'prefix' => '/v1/auth/',
    'namespace' => 'Api',

], function ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('me', 'AuthController@me');
    $router->post('payload', 'AuthController@payload');
    $router->post('register ', 'AuthController@register');

});
