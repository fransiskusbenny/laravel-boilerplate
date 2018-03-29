let mix = require('laravel-mix');

mix.combine([
    "resources/assets/vendor/assets/plugins/pace/pace.min.js",
    "resources/assets/vendor/assets/plugins/jquery/jquery-1.11.1.min.js",
    "resources/assets/vendor/assets/plugins/modernizr.custom.js",
    "resources/assets/vendor/assets/plugins/jquery-ui/jquery-ui.min.js",
    "resources/assets/vendor/assets/plugins/tether/js/tether.min.js",
    "resources/assets/vendor/assets/plugins/bootstrap/js/bootstrap.min.js",
    "resources/assets/vendor/assets/plugins/jquery/jquery-easy.js",
    "resources/assets/vendor/assets/plugins/jquery-unveil/jquery.unveil.min.js",
    "resources/assets/vendor/assets/plugins/jquery-bez/jquery.bez.min.js",
    "resources/assets/vendor/assets/plugins/jquery-ios-list/jquery.ioslist.min.js",
    "resources/assets/vendor/assets/plugins/imagesloaded/imagesloaded.pkgd.min.js",
    "resources/assets/vendor/assets/plugins/jquery-actual/jquery.actual.min.js",
    "resources/assets/vendor/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js",
    "resources/assets//vendor/assets/plugins/switchery/js/switchery.min.js",
  ],
  "public/js/vendor.js"
);

mix
  .js([
      "resources/assets/js/app.js",
      "resources/assets/vendor/pages/js/pages.js",
      "resources/assets/vendor/assets/js/scripts.js"
  ], "public/js")
  // .sass("resources/assets/vendor/pages/scss/pages.scss", "public/css")
  .options({
    processCssUrls: false
  }).version();
