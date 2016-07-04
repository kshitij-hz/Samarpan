<?php

Route::auth();
/*The routes for different page links*/
Route::get('/', 'PageController@index');
Route::get('about', 'PageController@about');
Route::get('contact', 'PageController@contact');

/*The routes for admin*/
Route::get('admin', 'AdminController@index');
Route::get('admin/search_citizens', 'AdminController@searchCitizens');
Route::get('admin/senior_citizens', 'AdminController@seniorCitizens');
Route::get('admin/profile_viewers', 'AdminController@profileViewers');
Route::get('admin/search_viewers', 'AdminController@searchViewers');
Route::get('admin/departments', 'AdminController@departments');
Route::get('admin/edit/{user}', 'AdminController@edit');
Route::get('admin/view/{user}', 'AdminController@show');
Route::get('admin/cvdownload/{detail}', 'AdminController@download');
Route::any('admin/update/{user}', 'AdminController@update');
Route::get('admin/settings', 'AdminController@settings');

/*The routes for verification purposes*/
Route::get('verification/', 'VerificationController@verification' );
Route::get('confirmation/{id}/{code}', 'VerificationController@confirmation');

/*The routes for other users*/
Route::get('profile', 'UserController@index');
Route::get('profile/view', 'UserController@profile');
Route::get('profile/verify_email', 'UserController@startVerification');
Route::get('profile/work_experience', 'UserController@workExperience');
Route::get('profile/edit', 'UserController@edit');
Route::get('search_senior_citizens', 'UserController@searchCitizens');
Route::get('view_senior_citizens', 'UserController@view');
Route::get('view_senior_citizen/{user}', 'UserController@show');
Route::get('cvdownload/{detail}', 'UserController@download');
Route::get('upload', 'UserController@uploadView');
Route::post('profile/add_experience', 'UserController@storeExperience');
Route::any('profile/new', 'UserController@store');
Route::any('profile/update', 'UserController@update');
Route::any('profile/bulk', 'UserController@bulkUpload');

/*The routes for finding autocomplete fields*/
Route::get('search/ministry', 'SearchController@getMinistry');
Route::get('search/department', 'SearchController@getDepartment');
Route::get('search/company', 'SearchController@getCompany');
Route::get('search/location', 'SearchController@getLocation');
Route::get('search/role', 'SearchController@getRole');
Route::get('search/position', 'SearchController@getPosition');
Route::get('search/firstnameviewer', 'SearchController@getFirstnameViewer');

/*The route for errors*/
Route::get('accessError', function() {
	return view('errors.404');
});
