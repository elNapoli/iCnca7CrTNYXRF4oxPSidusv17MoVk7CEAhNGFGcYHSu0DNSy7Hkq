var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.less('forum/forum.less', 'public/css/forum.css');
});