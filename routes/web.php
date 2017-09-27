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

Route::get('posts',function (){
    $posts = \App\Post::paginate(10);
    return view('coding.posts',compact('posts'));
});

Route::get('post/{post}',function (\App\Post $post){
    return view('coding.post',compact('post'));
});

Route::get('courses',function (){
    $courses = \App\Course::paginate(6);
    return view('coding.courses',compact('courses'));
});

Route::get('course/{course}',function (\App\Course $course){
    return view('coding.course',compact('course'));
});

Route::get('lesson/{lesson}',function (\App\Lesson $lesson){
    //dd(json_decode($lesson->video)[0]->download_link);
    return view('coding.lesson',compact('lesson'));
});

Route::get('books',function (){
    $books = \App\Book::orderBy('order','ASC')->paginate(30);
    dd($books);
    return view('coding.posts',compact('posts'));
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
