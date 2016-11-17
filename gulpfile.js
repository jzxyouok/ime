const elixir = require('laravel-elixir');
//
require('laravel-elixir-vue-2');

// const path = require('path');
//
// require('laravel-elixir-webpack-official');

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

// elixir(mix => {
//     mix.sass('app.scss')
//        .webpack('app.js');
// });

elixir(function (min) {
    min.styles([
        '/Static/Editor/css/wangEditor.min.css'
    ], 'public/css/style.css');
});

// elixir.webpack.config.module.loaders = [];

// elixir.webpack.mergeConfig({
//     resolveLoader: {
//         root: path.join(__dirname, 'node_modules'),
//     },
//     module: {
//         loaders: [
//             {
//                 test: /\.js$/,
//                 loader: 'babel',
//                 exclude: /node_modules/
//             },
//             {
//                 test: /\.css$/,
//                 loader: 'style!css'
//             }
//         ]
//     }
// });
