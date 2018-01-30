<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/

Route::get( '/test', function () {
    
    return response()->json( [ 'name' => 'test' ] );
} );

/** For User  */
Route::post( '/user/login', 'API\UserAPIController@login' );
Route::post( '/user/signup', 'API\UserAPIController@postSignup' );

//Auth::routes();
Route::post( '/user/forgot', 'API\UserAPIController@postForgotPassword' );
Route::get( '/password/reset/{token}', 'API\UserAPIController@resetPassword' );
Route::post( '/user/password', 'API\UserAPIController@postResetPassword' );
Route::get( 'signup/confirm/{token}', 'API\UserAPIController@confirmEmail' );
Route::get( 'rampe', 'API\TransportAPIController@getRampe' );



Route::group( [ 'middleware' => 'auth:api' ], function () {
    
    Route::put( '/user/update/{user}', 'API\UserAPIController@update' );
    Route::post( '/user/active/{user}', 'API\UserAPIController@updateStatus' );
    Route::get( '/roles/del', 'API\RolesAPIController@distoryRole' );
    Route::put( '/users/page', 'API\UserAPIController@users' );
    Route::get( '/users', 'API\UserAPIController@getUsers' );
    
    Route::get( '/user', 'API\UserAPIController@getUser' );
    Route::delete( '/user/{user}', 'API\UserAPIController@destroy' );
    Route::get( '/logout', 'API\UserAPIController@logout' );
    //Route::get('/users', 'API\UserAPIController@users');
    //Route::put('/users', 'API\UserAPIController@users');
    Route::resource( 'cards', 'API\CardsAPIController' );
    Route::get( '/roles', 'API\RolesAPIController@getRole' );
    Route::post( '/roles/create', 'API\RolesAPIController@createRole' );
    Route::get( '/roles/update', 'API\RolesAPIController@updateRole' );
    Route::get( 'transports/count', 'API\TransportAPIController@getTransportNotStart' );
    Route::get( 'transports/pdf/report/{transport}', 'API\TransportAPIController@getReport' );
    Route::post( 'transports/send/report/{transport}', 'API\TransportAPIController@postSendReport' );
    Route::get( 'transports/process/{transport}', 'API\TransportAPIController@getProcess' );
    Route::get( 'transports/forklift/show/{transport}', 'API\TransportAPIController@showForklift' );
    Route::put( 'transports/rampe/{transport}', 'API\TransportAPIController@updateTransportRampe' );
    Route::post( 'transports/pick-start/{transport}', 'API\TransportAPIController@updateTransportPickNStart' );
    Route::resource( 'transports', 'API\TransportAPIController' );
    Route::resource( 'countries', 'API\CountriesController' );
    Route::post('forklifts/images-update/{forklift}', 'API\ForkliftAPIController@uploadPictures');
    Route::post('forklifts/update/base64signature/{forklift}', 'API\ForkliftAPIController@uploadSignature');
    Route::post('forklifts/update/signature/{forklift}', 'API\ForkliftAPIController@uploadSignature');
    Route::delete( 'forklift/del-images/{forklift}/{image}', 'API\ForkliftAPIController@destroyImage' );
    Route::resource('forklifts', 'API\ForkliftAPIController');
    
} );



