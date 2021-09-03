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
 const path = require('path');

 module.exports = {
     entry: './resources/js/app.js',
     output: {
         filename: './public/javascripts/bundle.js',
     },
     resolve: {
         alias: {
             'vue$': 'vue/dist/vue.esm.js'
         },
         extensions: ['*', '.js', '.vue', '.json']
     },
     module: {
         rules: [
             {
                 test: /\.vue$/,
                 loader: 'vue-loader'
             }
         ]
     }
 };

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps().version()
    .vue();
