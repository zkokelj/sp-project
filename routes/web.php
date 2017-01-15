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
Route::post('addcar2user', 'UpdateController@addcar2user')->middleware('authenticated');
Route::post('addconsumption', 'UpdateController@addconsumption')->middleware('authenticated');
Route::post('changelanguage', 'PagesController@changeLanguage');
Route::post('updateName', 'UpdateController@updateName')->middleware('authenticated');
Route::post('updatePassword', 'UpdateController@updatePassword')->middleware('authenticated');
Route::post('searchForUsers', 'PagesController@searchForUsers')->middleware('authenticated');
Route::post('addComment', 'UpdateController@addComment')->middleware('authenticated');
Route::post('deletecar', 'UpdateController@deletecar')->middleware('authenticated');
