let mix = require('laravel-mix');

mix.js('src/app.js', 'dist/').js('src/part4.js', 'dist/').js('src/part5.js', 'dist/').js('src/part6.js', 'dist/').sass('src/app.scss', 'dist/');
