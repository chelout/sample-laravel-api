<?php

Route::get('/me', 'MeController')->name('api.me');

Route::get('/users', 'UserController@index')->name('api.users.index');
Route::get('/users/{user}', 'UserController@show')->name('api.users.show');

Route::get('/posts', 'PostController@index')->name('api.posts.index');
Route::post('/posts', 'PostController@store')->name('api.posts.store');
Route::get('/posts/{post}', 'PostController@show')->name('api.posts.show');
Route::put('/posts/{post}', 'PostController@update')->name('api.posts.update');
Route::delete('/posts/{post}', 'PostController@destroy')->name('api.posts.destroy');

Route::fallback('FallbackController')->name('fallback');
