const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.setPublicPath('./themes/movies/assets/')
mix.setResourceRoot('/themes/movies/assets/')

mix.js('./themes/movies/assets/javascript/app.js', 'dist/js')
    .postCss('./themes/movies/assets/css/theme.css', 'dist/css')
    .postCss('./themes/movies/assets/css/vendor.css', 'dist/css')

mix.browserSync({
    proxy: 'nginx',
    notify: false,
    files: ["./themes/movies/assets/dist/css/*.css", "./themes/movies/**/*.htm", "./themes/movies/assets/dist/js/*.js"]
})
    // .styles([
    //     './themes/movies/assets/css/theme.css',
    //     './themes/movies/assets/css/vendor.css',
    // ], './themes/movies/assets/dist/css/app.css');