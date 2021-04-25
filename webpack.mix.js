let mix = require('laravel-mix');
mix.js('assets/js/app.js', 'assets/dist/js/')
.sass('assets/scss/app.scss', 'assets/dist/css/')
.browserSync({
    proxy: "http://localhost/twigproject/",
    files: [
        "./assets/dist/*",
        "./assets/js/**/*.js",
        "./assets/scss/**/*.scss",
        "./assets/img/**/*.+(png|jpg|svg)",
        "./**/*.+(html|php)",
        "./views/**/*.+(html|twig)"
    ]
})