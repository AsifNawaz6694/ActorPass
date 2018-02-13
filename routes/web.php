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

// Route::get('/', function () {
//     return view('welcome');
// });


//Home Routes
Route::get('/', 'HomeController@index')->name('home');


/* Authentication Routes */
//Routes not allowed to access after Authentication using Guest Middleware
Route::group([ 'middleware' => 'guest'], function()
{
	//Login View
	Route::get('/login',  'AuthenticationController@login_index')->name('login_view');

	//Login Post
	Route::post('/login',  'AuthenticationController@login_post')->name('login_post');
	
	//Signup view
	Route::get('/register',  'AuthenticationController@register_index')->name('register_index'); 

	//Signup Post
	Route::post('/register',  'AuthenticationController@register_post')->name('signup_post');

});



//Routes accesible after authentication only , using Auth Middleware
Route::group(['middleware' => 'auth'], function()
{
	//Logout Route
	Route::get('/logout',  'AuthenticationController@logout_user')->name('logout_user');

	/* Dashbboard Routes */
	Route::get('/dashboard',  'DashboardController@index')->name('dash_index');

	/* Profile Route  - Index */
	Route::get('/dashboard/profile',  'ProfileController@index')->name('profile_index');

	/* Update Profile */	
	Route::post('/dashboard/update-profile',  'ProfileController@profile_update')->name('profile_update');	
});
