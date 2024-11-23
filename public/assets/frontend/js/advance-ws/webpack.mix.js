const mix = require('laravel-mix');
const fs = require('fs');

// JavaScript Files
mix.scripts([
       'public/assets/frontend/js/advance-ws/jquery.min.js',
       'public/assets/frontend/js/advance-ws/swiper-bundle.min.js',
       'public/assets/frontend/js/advance-ws/axios.min.js',
       'public/assets/frontend/js/advance-ws/preferences.js',
       'public/assets/frontend/js/advance-ws/toastr.min.js',
       'public/assets/frontend/js/advance-ws/imagesloaded.pkgd.min.js',
       'public/assets/frontend/js/advance-ws/isotope.pkgd.min.js',
       'public/assets/frontend/js/advance-ws/custom.js',
       'public/assets/frontend/js/advance-ws/app.js' // Ensure this is included last
   ], 'public/assets/frontend/js/advance-ws/mix.js'); // Save combined JS here

// CSS Files
mix.styles([
       'public/assets/frontend/css/advance-ws/bootstrap.min.css',
       'public/assets/frontend/css/advance-ws/reset.css',
       'public/assets/frontend/css/advance-ws/responsive.css',
       'public/assets/frontend/css/advance-ws/app.css',
       'public/assets/frontend/css/advance-ws/style.css',
       'public/assets/frontend/css/advance-ws/swiper.min.css',
       'public/assets/frontend/css/advance-ws/toastr.min.css'
   ], 'public/assets/frontend/css/advance-ws/mix.css'); // Save combined CSS here

// Enable Versioning for cache-busting
mix.version();

// Update manifest file to use versioned paths for custom theme structure
mix.then(() => {
    const manifestFilePath = 'public/mix-manifest.json';

    // Read the existing manifest
    const manifest = JSON.parse(fs.readFileSync(manifestFilePath));

    // Create new manifest with updated paths
    const updatedManifest = {
        '/assets/frontend/theme/mix.js': manifest['/assets/frontend/js/advance-ws/mix.js'],
        '/assets/frontend/theme/mix.css': manifest['/assets/frontend/css/advance-ws/mix.css']
    };

    // Write the updated manifest
    fs.writeFileSync(manifestFilePath, JSON.stringify(updatedManifest, null, 2));
});