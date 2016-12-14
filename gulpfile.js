const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(mix => {
    mix.sass('app.scss', 'resources/css')
       .webpack('app.js');

    //used to concatonate stylesheets
    //assumes any css we use is in resources/css, which is why we use 'public/css' in third argument
    mix.styles([
        'libs/bootstrap.min.css',
        'app.css',
        'libs/select2.min.css',
    	], null, 'resources/assets/css');

    //mix.scripts() to concatonate scripts
    mix.scripts([
        'libs/jquery.min.js',
        'libs/select2.min.js',
        ], null, 'resources/assets/js');


    //mix.phpUnit();
    mix.version('public/css/all.css');
});
