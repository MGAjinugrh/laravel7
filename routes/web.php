<?php

use Illuminate\Support\Facades\Route;

//index page
Route::get('all-posts', 'PostController@index')->name('posts.index');

//cek authentikasi (jatahnya posts)
Route::prefix('posts')->middleware('auth')->group(function () {
    //insert page and function (jadinya posts/{anakannya})
    Route::get('create', 'PostController@create')->name('posts.create');
    Route::post('store', 'PostController@store');

    //edit page and function
    Route::get('{post:slug}/edit', 'PostController@edit');
    Route::patch('{post:slug}/edit', 'PostController@update');
    //put -> update keseluruhan field di record pada tabel
    //patch -> update sebagian field di record pada tabel

});
//destroy page
Route::delete('posts/{post:slug}/delete', 'PostController@destroy');

//categories
Route::get('categories/{category:slug}', 'CategoryController@show');

//tag
Route::get('tags/{tag:slug}', 'TagController@show');

//detail
Route::get('posts/{post:slug}', 'PostController@show');

//the rest
Route::view('contact', 'contact');
Route::view('about', 'about');
Route::view('login', 'login');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
