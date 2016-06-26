<?php

Route::get('/', function () {
    return view('pages.home');
});

Route::auth();
/*The routes for different page links*/
Route::get('/home', 'HomeController@index');
// Route::get('home', 'PageController@index');
Route::get('about', 'PageController@about');
Route::get('contact', 'PageController@contact');

/*The routes for admin*/
Route::get('admin', 'AdminController@index');
Route::get('admin/senior_citizens', 'AdminController@senioerCitizens');
Route::get('admin/profile_viewers', 'AdminController@profileViewers');
Route::get('admin/modify', 'AdminController@modify');
Route::get('admin/edit', 'AdminController@settings');

/*The routes for other users*/
Route::get('profile', 'UserController@index');
Route::get('profile/edit', 'UserController@edit');
Route::post('profile/store', 'UserController@store');
Route::post('profile/store_experience', 'UserController@storeExperience');
Route::post('profile/bulk', 'UserController@bulkUpload');
Route::get('viewSeniorCitizens', 'UserController@view'); //view senior citizen details
Route::get('viewSeniorCitizens/{id}', 'UserController@show');

