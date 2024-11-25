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

// Update manifest file to use versioned paths for custom theme structure
mix.then(() => {
    const manifestFilePath = 'public/mix-manifest.json';

    try {
        // Read the existing manifest
        const manifest = JSON.parse(fs.readFileSync(manifestFilePath));

        // Create new manifest with updated paths
        const updatedManifest = {
            '/assets/frontend/theme/mix.js': manifest['/assets/frontend/js/default/mix.js'],
            '/assets/frontend/theme/mix.css': manifest['/assets/frontend/css/default/mix.css']
        };

        // Write the updated manifest
        fs.writeFileSync(manifestFilePath, JSON.stringify(updatedManifest, null, 2));
    } catch (error) {
        console.error('Error updating mix-manifest.json:', error);
    }
});