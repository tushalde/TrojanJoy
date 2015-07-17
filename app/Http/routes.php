<?php

Route::get('/', 'HomeController@index');
Route::get('/login/{access_token?}/{token_type?}/{expires_in?}', 'HomeController@action_login');

Route::group(array('prefix' => 'api'), function()
{
    Route::resource('user', 'UserController');
});

// Using different syntax for Blade to avoid conflicts with Jade.
// You are well-advised to go without any Blade at all.
Blade::setContentTags('<%', '%>'); // For variables and all things Blade.
Blade::setEscapedContentTags('<%%', '%%>'); // For escaped dalocata.