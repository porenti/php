const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/main.js')
    .css('resources/css/app.css', 'public/main.css');
