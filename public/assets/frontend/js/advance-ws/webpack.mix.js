const mix = require('laravel-mix');

// JavaScript Files
mix.scripts([
       'public/assets/frontend/js/advance-ws/app.js' // Ensure this is included last
   ], 'public/assets/frontend/js/advance-ws/mix.js'); // Save combined JS here

// CSS Files
mix.styles([
       'public/assets/frontend/css/advance-ws/app.css'
   ], 'public/assets/frontend/css/advance-ws/mix.css'); // Save combined CSS here

// Versioning for cache-busting (optional)
mix.version();
