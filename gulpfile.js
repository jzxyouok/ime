const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

const path = require('path');

require('laravel-elixir-webpack-official');

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
        'public/Static/admin/css/light-bootstrap-dashboard.css',
        'public/Static/admin/css/demo.css',
        'public/Static/admin/css/pe-icon-7-stroke.css'
    ], 'public/css/login.css');
});

elixir.webpack.config.module.loaders = [];

elixir.webpack.mergeConfig({
    resolveLoader: {
        root: path.join(__dirname, 'node_modules'),
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                loader: 'babel',
                exclude: /node_modules/
            },
            {
                test: /\.css$/,
                loader: 'style!css'
            }
        ]
    }
});
