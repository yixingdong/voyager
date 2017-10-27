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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('posts','PostController@index');

Route::get('post/{post}','PostController@show');

Route::get('courses','CourseController@index');

Route::get('course/{course}','CourseController@show');

Route::get('lesson/{lesson}','LessonController@show');

Route::resource('comment','CommentController');

Route::group(['prefix' => 'admin-coding'], function () {
    Voyager::routes();
});

Route::get('books','BookController@index');

Route::get('sitemap', 'SiteMapController@sitemap');

Route::get('time',function (){
    $now = \Carbon\Carbon::now()->format('Y-m-d h:i:s');
    dd($now);
});
