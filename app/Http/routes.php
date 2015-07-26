<?php

Route::get('/', ['as' => 'root', 'uses' => 'HomeController@index']);
Route::get('/login', 'HomeController@action_login');
Route::get('/logout', 'HomeController@action_logout');

Route::controller('home-controller', 'HomeController');


Route::group(array('prefix' => 'api'), function()
{
    //cant invoke index() for users i.e cant access all users
    Route::resource('user', 'UserController', ['except' => ['index', 'create', 'edit', 'store']]);
    Route::resource('post', 'PostsController', ['except' => ['edit', 'create']]);
});

// Using different syntax for Blade to avoid conflicts with Jade.
// You are well-advised to go without any Blade at all.
Blade::setContentTags('<%', '%>'); // For variables and all things Blade.
Blade::setEscapedContentTags('<%%', '%%>'); // For escaped dalocata.