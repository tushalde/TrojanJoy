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
            'resources/assets/js/libs/**/*.js',
            'resources/assets/js/libs/*.js',
            'resources/tj_apps/**/**/*.js',
            'vendor/kartik-v/bootstrap-fileinput/js/fileinput.js'
        ],'' ,'./');
    mix.styles([
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/css/trojan_joy_core.css',
        'resources/assets/css/login_page.css',
        'resources/assets/css/sell_home.css',
        'vendor/kartik-v/bootstrap-fileinput/css/fileinput.css',
        'resources/assets/css/signup.css',
        'resources/assets/css/profile_view.css'
        ],'','./');
    mix.version([
            'css/all.css',
            'js/all.js'
        ]);
    mix.copy('fonts','public/fonts')
});
