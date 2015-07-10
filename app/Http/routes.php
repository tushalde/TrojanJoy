<?php

Route::get('/', 'HomeController@index');

Route::group(array('prefix' => 'api', 'middleware' => 'auth'), function()
{
    Route::resource('home', 'HomController');

});

// Using different syntax for Blade to avoid conflicts with Jade.
// You are well-advised to go without any Blade at all.
Blade::setContentTags('<%', '%>'); // For variables and all things Blade.
Blade::setEscapedContentTags('<%%', '%%>'); // For escaped data.