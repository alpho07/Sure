const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

//Compile Sass and CSS into One Css File, 
elixir(mix => {
    mix.sass(['app.scss'], 'resources/assets/css/sass.css').styles(['resources/assets/css/sass.css','../bower/bootstrap-social/bootstrap-social.css','resources/assets/css/caveats.css',], 'public/css/app.css');
});

//Js into one JS File
elixir(mix => {
    mix.scripts(['app.js', '../bower/jquery/dist/jquery.js'], 'public/js/app.js');
});

//Copy Images to Public Folder
elixir(mix =>{
    mix.copy('resources/assets/images', 'public/build/images')
});


//Version Compiled Js and CSS Files
elixir(mix =>{
    mix.version(['css/app.css', 'js/app.js']);
});
