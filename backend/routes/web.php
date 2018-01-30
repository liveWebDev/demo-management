<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;

Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@postSearch');
//Route::get('/', 'HomeController@postSearch');
Route::get('/car/{id}', 'HomeController@getCar');
Route::post('/car/{id}', 'HomeController@stripeCharge');
Route::get('/contact', 'HomeController@contact');
Route::get('/faqs', 'HomeController@faqs');
Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@postLogin');
Route::get('/create-account', 'UserController@signup');
Route::post('/create-account', 'UserController@postSignup');

//Auth::routes();
Route::get('/logout', 'UserController@logout');
Route::get('/forgot-password', 'UserController@forgotPassword');
Route::post('/forgot-password', 'UserController@postForgotPassword');
Route::get('/password/reset/{token}', 'UserController@resetPassword');
Route::post('/reset-password', 'UserController@postResetPassword');
Route::get('signup/confirm/{token}', 'UserController@confirmEmail');

/*Route::get('/booking', 'BookingController@index');
Route::post('/booking', 'BookingController@booking');*/


/* ajax routes */
Route::get('ajax/models/{id}',  ['as' => 'ajax.get.models',  'uses' => 'AjaxController@getModels']);
Route::get('ajax/schedule/{date}',  ['as' => 'ajax.get.schedule',  'uses' => 'AjaxController@getSchedule']);


/*// First route that user visits on consumer app
Route::get('/', function () {
  // Build the query parameter string to pass auth information to our request
  $query = http_build_query([
    'client_id' => 2,
    'redirect_uri' => 'http://eliterides.dev/callback',
    'response_type' => 'code',
    'scope' => 'booking'
  ]);
  
  // Redirect the user to the OAuth authorization page
  return redirect('http://eliterides.dev/oauth/authorize?' . $query);
});

// Route that user is forwarded back to after approving on server
Route::get('callback', function (Request $request) {
  $http = new GuzzleHttp\Client;
  
  $response = $http->post('http://eliterides.dev/oauth/token', [
    'form_params' => [
      'grant_type' => 'authorization_code',
      'client_id' => 1, // from admin panel above
      'client_secret' => 'uUNoxf2ibTN7d6AOsIdgsI3wiZIX3SJTTJ8NEWiT', // from admin panel above
      'redirect_uri' => 'http://eliterides.dev/callback',
      'code' => $request->code // Get code from the callback
    ]
  ]);
  
  // echo the access token; normally we would save this in the DB
  return json_decode((string) $response->getBody(), true)['access_token'];
});*/

Route::resource('transports', 'TransportController');

Route::resource('forklifts', 'ForkliftController');