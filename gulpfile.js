var elixir = require("laravel-elixir");

elixir(function (mix) {

    mix.sass("app.scss", "public/css/app.css");
    mix.less("bootstrap/bootstrap.less", "public/css/bootstrap.css");
    mix.styles([
        "bootstrap.css",
        "app.css"
    ], null, "public/css");

    mix.version([
        "public/css/all.css"
    ]);

});
