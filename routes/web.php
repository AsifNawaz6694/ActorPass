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


//public pages routes
Route::get('/', function(){
	return view('front.index');
})->name('home');

Route::get('/about', function(){
	return view('front.about');
})->name('about');

Route::get('/takeaclass', function(){
	return view('front.takeaclass');
})->name('takeaclass');

Route::get('/faq', function(){
	return view('front.faq');
})->name('faq');

Route::get('/contact', function(){
	return view('front.contact');
})->name('contact');




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

	//Reset Password view
	Route::get('/reset-password/{token?}',  'AuthenticationController@pass_reset_view')->name('pass_reset_view'); 

	//Reset Password Post 
	Route::post('/reset_pass_post',  'AuthenticationController@reset_pass_post')->name('reset_pass_post'); 

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

	/* My classes Route  - Index */
	Route::get('/dashboard/myclasses',  'ClassesController@my_classes')->name('classes_index');


	/* Edit Profile Password */
	Route::post('/dashboard/edit_password',  'ProfileController@edit_password_post')->name('edit_password_post');	
});




Route::get('admin', function(){
	return view('admin.index');
});

// Users CRUD Routes
Route::get('admin/users', 'AdminController@users')->name('users');
Route::get('admin/user/{id}', 'AdminController@user_view')->name('user');
Route::get('admin/user/{id}/edit', 'AdminController@user_edit')->name('user_edit');
Route::post('ImageUpload',['as'=>'ImageUpload','uses'=>'AdminController@ImageUpload']);
Route::post('update_user/{id}',['as'=>'update_user','uses'=>'AdminController@update']);

// Classes CRUD Routes
Route::get('admin/classes', 'ClassesController@index')->name('classes');
Route::get('admin/classes/create', 'ClassesController@create')->name('create_class');
Route::post('admin/classes/store', 'ClassesController@store')->name('store_class');
Route::get('admin/classes/edit/{id}', 'ClassesController@edit')->name('edit_class');
Route::post('admin/classes/update/{id}', 'ClassesController@update')->name('update_class');
Route::get('admin/classes/delete/{id}', 'ClassesController@destroy')->name('delete_class');