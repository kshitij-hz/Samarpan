<?php

Route::auth();
/*The routes for different page links*/
Route::get('/', 'PageController@index');
Route::get('about', 'PageController@about');
Route::get('contact', 'PageController@contact');

/*The routes for admin*/
Route::get('admin', 'AdminController@index');
Route::get('admin/senior_citizens', 'AdminController@seniorCitizens');
Route::get('admin/profile_viewers', 'AdminController@profileViewers');
Route::get('admin/departments', 'AdminController@departments');
Route::get('admin/edit/{id}', 'AdminController@edit');
Route::post('admin/update', 'AdminController@update');
Route::get('admin/settings', 'AdminController@settings');

/*The routes for other users*/
Route::get('profile', 'UserController@index');
Route::get('profile/view', 'UserController@profile');
Route::get('profile/work_experience', 'UserController@workExperience');
Route::get('profile/edit', 'UserController@edit');
Route::get('view_senior_citizens', 'UserController@view');
Route::get('view_senior_citizen/{user}', 'UserController@show');
Route::get('cvdownload/{detail}', 'UserController@download');
Route::get('upload', 'UserController@uploadView');
Route::any('profile/new', 'UserController@store');
Route::any('profile/update', 'UserController@update');
Route::post('profile/add_experience', 'UserController@storeExperience');
Route::post('profile/bulk', 'UserController@bulkUpload');


/*The route for errors*/
Route::get('accessError', function() {
	return view('errors.404');
});
