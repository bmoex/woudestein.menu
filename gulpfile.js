var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

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

elixir(function (mix) {
    // Generate style from sass / javascript
    mix.sass('app.scss');
    mix.scripts([
        "serfhos-object.js",
        "serfhos-responsive.js",
        "serfhos-application.js"
    ]);
});
