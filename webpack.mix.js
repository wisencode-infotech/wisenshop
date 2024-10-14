const mix = require('laravel-mix');

// JavaScript Files
mix.js('resources/js/app.js', 'public/assets/frontend/js') // Save compiled app.js here
   .scripts([
       'public/assets/frontend/js/jquery.min.js',
       'public/assets/frontend/js/swiper-bundle.min.js',
       'public/assets/frontend/js/axios.min.js',
       'public/assets/frontend/js/preferences.js',
       'public/assets/frontend/js/toastr.min.js',
       'public/assets/frontend/js/app.js' // Ensure this is included last
   ], 'public/assets/frontend/js/mix.js'); // Save combined JS here

// CSS Files
mix.styles([
       'public/assets/frontend/css/main.css',
       'public/assets/frontend/css/rc-style.css',
       'public/assets/frontend/css/style.css',
       'public/assets/frontend/css/app.css',
       'public/assets/frontend/css/swiper.min.css',
       'public/assets/frontend/css/toastr.min.css'
   ], 'public/assets/frontend/css/mix.css'); // Save combined CSS here

// Versioning for cache-busting (optional)
mix.version();
