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
// return view('welcome');
// });

Route::group(['middleware' => 'auth'], function() {
Route::resource('posts', 'PostsController');
Route::patch('verify/{post}', 'PostsController@verify');
Route::patch('verify_no/{post}', 'PostsController@verify_no');
Route::resource('articles', 'ArticlesController');
Route::patch('verifya/{article}', 'ArticlesController@verify');
Route::patch('verifya_no/{article}', 'ArticlesController@verify_no');
Route::resource('contests', 'ContestsController');
Route::patch('verifyc/{contest}', 'ContestsController@verify');
Route::patch('verifyc_no/{contest}', 'ContestsController@verify_no');
//Route::resource('comments', 'CommentsController');
});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/', 'StudiosController@welcome');
Route::resource('studio','StudiosController');
Route::resource('blog','BlogsController');
Route::resource('competition','CompetitionsController');