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
    mix.sass('app.scss');

   /*
    assets Global
    */

    mix.copy('resources/assets/restful/restful.js', 'public/js/restful.js');

    mix.copy('resources/assets/datatables/js/extensions', 'public/js/datatables_ext');

    mix.copy('resources/assets/datatables/css/buttons.dataTables.min.css', 'public/css/datatables/buttons/buttons.dataTables.min.css');

});

