const mix = require('laravel-mix');

mix.version();

if (mix.inProduction()) {
    mix.sourceMaps();
}

mix.js('resources/js/app.js', 'public/js/app.js');
mix.sass('resources/sass/app.scss', 'public/css/app.css');

mix.js('resources/js/shop/main.js', 'public/js/shop.js').vue();
mix.sass('resources/sass/shop/app.scss', 'public/css/shop.css');