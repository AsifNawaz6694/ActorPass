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




//Wall Related Routes
Route::get('your_class/{id}','StudentController@video_upload')->name('upload_video');
Route::get('student-wall/{id}','StudentController@student_wall')->name('student_wall');
Route::get('student_profile/{id}','StudentController@student_profile')->name('student_profile');
Route::post('my_video','StudentController@submit_video')->name('ajax_submit_video');
Route::post('update_cover','StudentController@update_cover')->name('ajax_change_cover');


Route::group(['prefix' => 'admin' ,  'middleware' => 'is-admin'], function () {

Route::get('index', 'AdminController@index')->name('admin_index');
Route::get('admin_logout', 'AdminController@admin_logout')->name('admin_logout');


// Users CRUD/Other Routes
Route::get('users', 'AdminController@users')->name('users');
Route::get('user/create', 'AdminController@create')->name('create_user');
Route::post('user/store', 'AdminController@store')->name('store_user');
Route::get('user/{id}', 'AdminController@user_view')->name('user');
Route::get('user/{id}/edit', 'AdminController@user_edit')->name('user_edit');
Route::post('ImageUpload',['as'=>'ImageUpload','uses'=>'AdminController@ImageUpload']);
Route::post('update_user/{id}',['as'=>'update_user','uses'=>'AdminController@update']);
Route::post('user/password_update/{id}', 'AdminController@update_password')->name('update_password');
Route::get('user/delete/{id}', 'AdminController@destroy')->name('delete_user');
Route::get('/activate_user/{id}/', ["as" => "activate-user", "uses" => "AdminController@activate_user"]);
Route::get('/deactivate_user/{id}/', ["as" => "deactivate-user", "uses" => "AdminController@deactivate_user"]);


// Classes CRUD Routes
Route::get('classes', 'ClassesController@index')->name('classes');
Route::get('classes/create', 'ClassesController@create')->name('create_class');
Route::post('classes/store', 'ClassesController@store')->name('store_class');
Route::post('classes/update/{id}', 'ClassesController@update')->name('update_class');
Route::post('classes/enroll_students_store', 'ClassesController@enroll_students_store')->name('enroll_students_store');
Route::get('classes/edit/{id}', 'ClassesController@edit')->name('edit_class');
Route::get('classes/view/{id}', 'ClassesController@view_class')->name('view_class');
Route::get('classes/delete/{id}', 'ClassesController@destroy')->name('delete_class');
Route::get('classes/enroll_students/{id}', 'ClassesController@enroll_students')->name('enroll_students');
Route::get('/send_emails_to_all_users/{id}','ClassesController@send_emails')->name('send_emails');
Route::get('classes/delete_enroll_student/{id}', 'ClassesController@delete_enroll_student')->name('delete_enroll_student');

});

// Payment Related Routes
Route::get('account_feature/', 'PaypalController@getCheckout')->name('account_feature');
Route::get('getDone/', 'PaypalController@getDone')->name('getDone');
Route::get('getCancel/', 'PaypalController@getCancel')->name('getCancel');