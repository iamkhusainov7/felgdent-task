const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
    devtool: "cheap-source-map",
    module: {
        rules: [{
            test: /\.js?$/,
            exclude: /(bower_nodes)/,
            use: [{
                loader: 'babel-loader',
                options: mix.config.babel()
            }]
        }]
    }
})

// mix.copy('resources/js/scripts', 'public/js/scripts');
// mix.copy('resources/js/core/libraries', 'public/js');

mix
    .js('resources/js/group-page.js', 'public/assets/js')
    .js('resources/js/user-page.js', 'public/assets/js')
    .js('resources/js/register-page.js', 'public/assets/js')
    .js('resources/js/myaccount-page.js', 'public/assets/js')
