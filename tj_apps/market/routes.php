<?php

Route::get('/market', 'market\Controllers\BaseController@home');
Route::get('/sell', 'market\Controllers\SellController@sell_home');