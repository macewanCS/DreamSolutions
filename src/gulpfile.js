var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss', 'resources/css');

    mix.styles([
        'libs/header.css',
        'manage_plan.css',
        'select2_4.0.2.css'
        ]);

    mix.version('css/all.css');

    mix.scripts([
        'ajaxJquery1.12.0.js',
        'bootstrap3.3.6.js',
        'select2_4.2.0.js',
    	'cascadeFillSelect.js'
    	], 'public/build/js/all.js',
    	'resources/assets/js');
});
