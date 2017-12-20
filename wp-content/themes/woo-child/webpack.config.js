var path = require('path');
var webpack = require('webpack');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var LiveReloadPlugin = require('webpack-livereload-plugin');

// for styles
var postcss = require('postcss-loader');
var postcssMixins = require('postcss-mixins');
var atImport = require('postcss-import');
var precss = require('precss');
var autoprefixer = require('autoprefixer');


module.exports = {
    entry: {
        main: './wp-content/themes/woo-child/js/main.js'
    },
    output: {
        path: path.resolve(__dirname, './wp-content/themes/woo-child/build/js/'),
        filename: "[name].js"
    },
    module: {
        preLoaders: [
            {
                test: /\.js$/, // include .js files
                exclude: /node_modules/, // exclude any and all files in the node_modules folder
                loader: "jshint-loader"
            }
        ],
        loaders: [
            {
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: '/node_modules/',
                query: {
                    presets: ['es2015']
                }
            },
            // SCSS loaders
            // {
            //     test: /\.scss$/,
            //     loader: ExtractTextPlugin.extract("style-loader", "css-loader!sass-loader")
            // },
            // post-css
            {
                test: /\.css$/,
                loader: "style-loader!css-loader!postcss-loader"
            }

        ]
    },
    postcss: function(webpack) {
        return [
            precss,
            postcssMixins,
            autoprefixer,
            atImport({
                path: './src/css/main.css',
                addDependencyTo: webpack
            })
        ];
    },
    // jshint: {
    
    //     esversion: 6
    // }
    ,
    devtool: 'source-map',
    // Use the plugin to specify the resulting filename (and add needed behavior to the compiler)
    plugins: [
        // output path for css styles relative to javascript output
        // new ExtractTextPlugin('../css/[name].css'),
        new LiveReloadPlugin()
    ]
};
