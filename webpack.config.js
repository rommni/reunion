var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())
    .autoProvidejQuery()
    // uncomment to define the assets of the project
    .addEntry('js/bootstrap', './assets/js/bootstrap.js')
    .addEntry('js/addReunion', './assets/js/addReunion.js')
    .addEntry('js/showReunion', './assets/js/showReunion.js')
    .addStyleEntry('css/bootstrap', './assets/css/bootstrap.css')
    .addStyleEntry('css/main', './assets/css/main.css')

    // uncomment if you use Sass/SCSS files
    // .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable

;

module.exports = Encore.getWebpackConfig();
