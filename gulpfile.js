var elixir = require("laravel-elixir");

elixir(function (mix) {

  mix.sass("app.scss", "public/css/app.css");
  mix.less("bootstrap/bootstrap.less", "public/css/bootstrap.css");
  mix.styles([
      "bootstrap.css",
      "app.css",
      "vendor/assignment.css",
      "vendor/auth.css",
      "bootstrap.min.css",
      "vendor/bootstrap-select.min.css",
      "vendor/bootstrap-theme.css",
      "vendor/bootstrap-theme.min.css",
      "vendor/common.css",
      "vendor/header.css",
      "vendor/jquery-ui.min.css",
      "vendor/navbar.css",
      "vendor/pe-icon-7-stroke.css",
      "vendor/sidebar.css"
  ], null, "public/css");

  mix.scripts([
      "vendor/jquery.js",
      "vendor/bootstrap-select.min.js",
      "vendor/bootstrap.js",
      "vendor/bootstrap.min.js",
      "vendor/common.js",
      "vendor/jquery-ui.min.js",
      "bootstrap.min.js",
      "common.js"
  ]);

  mix.version([
      "public/css/all.css",
      "public/js/all.js"
  ]);
});
