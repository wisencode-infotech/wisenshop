const mix = require('laravel-mix');
const fs = require('fs');

// JavaScript Files
mix.scripts([
       'public/assets/frontend/js/default/jquery.min.js',
       'public/assets/frontend/js/default/toastr.min.js',
       'public/assets/frontend/js/advance-ws/app.js' // Ensure this is included last
   ], 'public/assets/frontend/js/advance-ws/mix.js'); // Save combined JS here

// CSS Files
mix.styles([
       'public/assets/frontend/css/advance-ws/app.css',
       'public/assets/frontend/css/default/toastr.min.css'
   ], 'public/assets/frontend/css/advance-ws/mix.css'); // Save combined CSS here

// Versioning for cache-busting (optional)
mix.version();

// Rewrite public/mix-manifest.json based on theme
mix.then(() => {
    const manifest_file_path = 'public/mix-manifest.json';

    const updated_manifest_object = {
        '/assets/frontend/theme/mix.js': '/assets/frontend/js/advance-ws/mix.js',
        '/assets/frontend/theme/mix.css': '/assets/frontend/css/advance-ws/mix.css'
    };

    fs.writeFileSync(manifest_file_path, JSON.stringify(updated_manifest_object, null, 2));
});
