<?php

Route::get('/', function () {
    return view('layout');
});

// Using different syntax for Blade to avoid conflicts with Jade.
// You are well-advised to go without any Blade at all.
Blade::setContentTags('<%', '%>'); // For variables and all things Blade.
Blade::setEscapedContentTags('<%%', '%%>'); // For escaped data.