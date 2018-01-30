<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@login');
Route::post('/', 'HomeController@postLogin');

//Route::group(['middleware' => 'manager'], function () {
Route::group(['middleware' => ['role:administrator,access_backend']], function () {

  Route::get('/logout', 'HomeController@logout');
  Route::post('/logout', 'HomeController@logout');

  Route::get('users', ['as' => 'admin.users.index', 'middleware' => 'role:administrator', 'uses' => 'UserController@index']);
  Route::post('users', ['as' => 'admin.users.store',  'middleware' => 'role:administrator',  'uses' => 'UserController@store']);
  Route::get('users/create', ['as' => 'admin.users.create',  'middleware' => 'role:administrator', 'uses' => 'UserController@create']);
  Route::put('users/{users}', ['as' => 'admin.users.update', 'middleware' => 'role:administrator',  'uses' => 'UserController@update']);
  Route::patch('users/{users}', ['as' => 'admin.users.update', 'middleware' => 'role:administrator',  'uses' => 'UserController@update']);
  Route::delete('users/{users}', ['as' => 'admin.users.destroy', 'middleware' => 'role:administrator',  'uses' => 'UserController@destroy']);
  Route::get('users/{users}', ['as' => 'admin.users.show', 'middleware' => 'role:administrator',  'uses' => 'UserController@show']);
  Route::get('users/{users}/edit', ['as' => 'admin.users.edit', 'middleware' => 'role:administrator',  'uses' => 'UserController@edit']);
  //Ajax datatable route
  Route::get('users/datatables/data', ['as' => 'admin.users.data', 'middleware' => 'role:administrator', 'uses' => 'UserController@anyData']);

  
  Route::get('/logout', 'HomeController@logout');
  Route::post('/logout', 'HomeController@logout');

  Route::get('users', ['as' => 'admin.users.index',  'middleware' => 'role:administrator', 'uses' => 'UserController@index']);
  Route::post('users', ['as' => 'admin.users.store', 'middleware' => 'role:administrator', 'uses' => 'UserController@store']);
  Route::get('users/create', ['as' => 'admin.users.create', 'middleware' => 'role:administrator', 'uses' => 'UserController@create']);
  Route::put('users/{users}', ['as' => 'admin.users.update', 'middleware' => 'role:administrator', 'uses' => 'UserController@update']);
  Route::patch('users/{users}', ['as' => 'admin.users.update', 'middleware' => 'role:administrator', 'uses' => 'UserController@update']);
  Route::delete('users/{users}', ['as' => 'admin.users.destroy', 'middleware' => 'role:administrator', 'uses' => 'UserController@destroy']);
  Route::get('users/{users}', ['as' => 'admin.users.show', 'middleware' => 'role:administrator', 'uses' => 'UserController@show']);
  Route::get('users/{users}/edit', ['as' => 'admin.users.edit', 'middleware' => 'role:administrator', 'uses' => 'UserController@edit']);
  //Ajax datatable route
  Route::get('users/datatables/data', ['as' => 'admin.users.data', 'middleware' => 'role:administrator', 'uses' => 'UserController@anyData']);
  Route::post('users/status', ['as' => 'admin.users.status',  'middleware' => 'role:administrator', 'uses' => 'UserController@changeUserStatus']);

  
  Route::get('pages', ['as'=> 'admin.pages.index', 'middleware' => 'role:administrator', 'uses' => 'PagesController@index']);
  Route::post('pages', ['as'=> 'admin.pages.store', 'middleware' => 'role:administrator', 'uses' => 'PagesController@store']);
  Route::get('pages/create', ['as'=> 'admin.pages.create', 'middleware' => 'role:administrator', 'uses' => 'PagesController@create']);
  Route::put('pages/{pages}', ['as'=> 'admin.pages.update', 'middleware' => 'role:administrator', 'uses' => 'PagesController@update']);
  Route::patch('pages/{pages}', ['as'=> 'admin.pages.update', 'middleware' => 'role:administrator', 'uses' => 'PagesController@update']);
  Route::delete('pages/{pages}', ['as'=> 'admin.pages.destroy', 'middleware' => 'role:administrator', 'uses' => 'PagesController@destroy']);
  Route::get('pages/{pages}', ['as'=> 'admin.pages.show', 'middleware' => 'role:administrator', 'uses' => 'PagesController@show']);
  Route::get('pages/{pages}/edit', ['as'=> 'admin.pages.edit', 'middleware' => 'role:administrator', 'uses' => 'PagesController@edit']);

  Route::get('pages', ['as'=> 'admin.pages.index', 'middleware' => 'role:administrator', 'uses' => 'PagesController@index']);
  Route::post('pages', ['as'=> 'admin.pages.store', 'middleware' => 'role:administrator', 'uses' => 'PagesController@store']);
  Route::get('pages/create', ['as'=> 'admin.pages.create',  'middleware' => 'role:administrator', 'uses' => 'PagesController@create']);
  Route::put('pages/{pages}', ['as'=> 'admin.pages.update',  'middleware' => 'role:administrator', 'uses' => 'PagesController@update']);
  Route::patch('pages/{pages}', ['as'=> 'admin.pages.update',  'middleware' => 'role:administrator', 'uses' => 'PagesController@update']);
  Route::delete('pages/{pages}', ['as'=> 'admin.pages.destroy',  'middleware' => 'role:administrator', 'uses' => 'PagesController@destroy']);
  Route::get('pages/{pages}', ['as'=> 'admin.pages.show',  'middleware' => 'role:administrator', 'uses' => 'PagesController@show']);
  Route::get('pages/{pages}/edit', ['as'=> 'admin.pages.edit',  'middleware' => 'role:administrator', 'uses' => 'PagesController@edit']);


    /*news-letter*/
    Route::get('newsLetters', ['as'=> 'admin.newsLetters.index', 'uses' => 'NewsLetterController@index']);
    Route::post('newsLetters', ['as'=> 'admin.newsLetters.store', 'uses' => 'NewsLetterController@store']);
    Route::get('newsLetters/create', ['as'=> 'admin.newsLetters.create', 'uses' => 'NewsLetterController@create']);
    Route::put('newsLetters/{newsLetters}', ['as'=> 'admin.newsLetters.update', 'uses' => 'NewsLetterController@update']);
    Route::patch('newsLetters/{newsLetters}', ['as'=> 'admin.newsLetters.update', 'uses' => 'NewsLetterController@update']);
    Route::delete('newsLetters/{newsLetters}', ['as'=> 'admin.newsLetters.destroy', 'uses' => 'NewsLetterController@destroy']);
    Route::get('newsLetters/{newsLetters}', ['as'=> 'admin.newsLetters.show', 'uses' => 'NewsLetterController@show']);
    Route::get('newsLetters/{newsLetters}/edit', ['as'=> 'admin.newsLetters.edit', 'uses' => 'NewsLetterController@edit']);


    /*settings*/
  Route::get('settings', ['as'=> 'admin.settings.index', 'middleware' => 'role:administrator|owner', 'uses' => 'SettingsController@index']);
  Route::post('settings', ['as'=> 'admin.settings.store', 'middleware' => 'role:administrator|owner', 'uses' => 'SettingsController@store']);
});
