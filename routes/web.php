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
Route::resource('articles', 'ArticlesController');
Route::resource('contests', 'ContestsController');
//Route::resource('comments', 'CommentsController');
});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/', 'StudiosController@welcome');
Route::resource('studio','StudiosController');
Route::resource('blog','BlogsController');
Route::resource('competition','CompetitionsController');