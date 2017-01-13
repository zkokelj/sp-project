<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

//For password reset
Route::post('password/reset', 'PagesController@password_reset');



Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Route::get('/', 'PagesController@index');
Route::get('/calculator', 'PagesController@calculator');
Route::get('/fuelprice', 'PagesController@fuelprice');
Route::get('/pagestats', 'PagesController@pagestats');
Route::get('/consumption', 'PagesController@consumption')->middleware('authenticated');
Route::get('/comment', 'PagesController@comment')->middleware('authenticated');
Route::get('/editProfile', 'PagesController@editProfile')->middleware('authenticated');


Route::get('/home', 'PagesController@index');

//Post Routes

Route::post('addcar2user', 'PagesController@addcar2user');

Route::post('addconsumption', 'PagesController@addconsumption');

Route::post('searchConsumption', 'PagesController@searchConsumption');


Route::post('changelanguage', 'PagesController@changeLanguage');

Route::post('updateName', 'PagesController@updateName');
Route::post('updatePassword', 'PagesController@updatePassword');
