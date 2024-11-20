const mix = require('laravel-mix');

// JavaScript Files
mix.scripts([
       'public/assets/frontend/js/advance-ws/jquery.min.js',
       'public/assets/frontend/js/advance-ws/swiper-bundle.min.js',
       'public/assets/frontend/js/advance-ws/axios.min.js',
       'public/assets/frontend/js/advance-ws/preferences.js',
       'public/assets/frontend/js/advance-ws/toastr.min.js',
       'public/assets/frontend/js/advance-ws/app.js' // Ensure this is included last
   ], 'public/assets/frontend/js/advance-ws/mix.js'); // Save combined JS here

// CSS Files
mix.styles([
       'public/assets/frontend/css/advance-ws/main.css',
       'public/assets/frontend/css/advance-ws/rc-style.css',
       'public/assets/frontend/css/advance-ws/style.css',
       'public/assets/frontend/css/advance-ws/app.css',
       'public/assets/frontend/css/advance-ws/swiper.min.css',
       'public/assets/frontend/css/advance-ws/toastr.min.css'
   ], 'public/assets/frontend/css/advance-ws/mix.css'); // Save combined CSS here

// Versioning for cache-busting (optional)
mix.version();
