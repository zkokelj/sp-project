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


Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
Route::get('/', 'PagesController@index');
Route::get('/calculator', 'PagesController@calculator');
Route::get('/fuelprice', 'PagesController@fuelprice');
Route::get('/pagestats', 'PagesController@pagestats');
Route::get('/consumption', 'PagesController@consumption')->middleware('authenticated');
Route::get('/comment', 'PagesController@comment')->middleware('authenticated');
Route::get('/editProfile', 'PagesController@editProfile')->middleware('authenticated');
Route::get('/home', 'PagesController@index');
Route::post('searchConsumption', 'PagesController@searchConsumption');
Route::post('addcar2user', 'UpdateController@addcar2user');
Route::post('addconsumption', 'UpdateController@addconsumption');
Route::post('changelanguage', 'PagesController@changeLanguage');
Route::post('updateName', 'UpdateController@updateName');
Route::post('updatePassword', 'UpdateController@updatePassword');
Route::post('searchForUsers', 'PagesController@searchForUsers');
Route::post('addComment', 'UpdateController@addComment');
