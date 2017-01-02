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
elixir(function(mix) {
    mix.sass('app.scss').sass('backend.scss')
        .webpack('app.js')
        .version(['public/css/app.css','public/css/backend.css'])
        .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/build/fonts/bootstrap')
        .scripts([
           'vendor/jquery.singlePageNav.min.js',
           'vendor/jquery.fancybox.pack.js',
            'vendor/owl.carousel.min.js',
            'vendor/jquery.easing.min.js',
            'vendor/jquery.slitslider.js',
            'vendor/jquery.ba-cond.min.js',
            'vendor/wow.min.js',
            'frontend.js'
        ],'public/js/frontend-version.js').scripts([
        'vendor/metisMenu.min.js',
        'backend.js'
    ],'public/js/backend-version.js')

});