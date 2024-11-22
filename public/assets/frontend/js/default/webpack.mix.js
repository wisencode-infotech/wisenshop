const mix = require('laravel-mix');
const fs = require('fs');

// JavaScript Files
mix.scripts([
       'public/assets/frontend/js/default/jquery.min.js',
       'public/assets/frontend/js/default/swiper-bundle.min.js',
       'public/assets/frontend/js/default/axios.min.js',
       'public/assets/frontend/js/default/preferences.js',
       'public/assets/frontend/js/default/toastr.min.js',
       'public/assets/frontend/js/default/app.js' // Ensure this is included last
   ], 'public/assets/frontend/js/default/mix.js'); // Save combined JS here

// CSS Files
mix.styles([
       'public/assets/frontend/css/default/main.css',
       'public/assets/frontend/css/default/rc-style.css',
       'public/assets/frontend/css/default/style.css',
       'public/assets/frontend/css/default/app.css',
       'public/assets/frontend/css/default/swiper.min.css',
       'public/assets/frontend/css/default/toastr.min.css'
   ], 'public/assets/frontend/css/default/mix.css'); // Save combined CSS here

// Versioning for cache-busting (optional)
mix.version();

// Rewrite public/mix-manifest.json based on theme
mix.then(() => {
    const manifest_file_path = 'public/mix-manifest.json';

    const updated_manifest_object = {
        '/assets/frontend/theme/mix.js': '/assets/frontend/js/default/mix.js',
        '/assets/frontend/theme/mix.css': '/assets/frontend/css/default/mix.css'
    };

    fs.writeFileSync(manifest_file_path, JSON.stringify(updated_manifest_object, null, 2));
});