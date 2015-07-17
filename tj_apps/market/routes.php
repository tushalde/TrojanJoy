<?php

Route::get('/market', ['as' => 'market-home', 'uses' => 'market\Controllers\BaseController@home']);
Route::get('/sell', 'market\Controllers\SellController@sell_home');