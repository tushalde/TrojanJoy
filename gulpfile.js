var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.scripts([
            'assets/js/libs/**/*.js',
            'assets/js/libs/*.js',
            'tj_apps/**/**/*.js'
        ],'' ,'resources/');
    mix.styles([
        'bootstrap.min.css',
        'trojan_joy_core.css',
        'login_page.css'

    ]);
    mix.version([
            'css/all.css',
            'js/all.js'
        ]);
    mix.copy('fonts','public/fonts')
});
