<?php

Route::get('/market', ['as' => 'market-home', 'uses' => 'market\Controllers\BaseController@home']);
Route::get('/sell', 'market\Controllers\SellController@sell_home');
Route::get('/signup', 'market\Controllers\SignupController@signup');
Route::get('/profile', 'market\Controllers\ProfileController@profile_view');