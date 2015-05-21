var gulp = require('gulp');
var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix
        .sass('admin.scss', 'resources/assets/css')

        .styles([
            'bootstrap.min.css',
            'AdminLTE/AdminLTE.min.css',
            'AdminLTE/skins/_all-skins.min.css',
            'font-awesome.min.css',
            'dataTables.bootstrap.css',
            'admin.css'
        ], 'public/css/admin.css')

        .coffee('admin.coffee', 'resources/assets/js')
        .coffee('rolesPermissions.coffee', 'resources/assets/js')

        .scripts([
            'jquery-2.1.4.min.js',
            'jquery-ui.min.js',
            'bootstrap.min.js',
            'AdminLTE/app.min.js',
            'jquery.dataTables.min.js',
            'dataTables.bootstrap.min.js',
            'jquery.noty.packaged.min.js',
            'common.new.js',
            'admin.js',
            'rolesPermissions.js'
        ], 'public/js/admin.js')

        .version([
            'css/admin.css',
            'js/admin.js'
        ]);
});