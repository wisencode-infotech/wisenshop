const axios = require('axios');
const fs = require('fs');
const dotenv = require('dotenv');
const path = require('path');

dotenv.config({ path: path.resolve(__dirname, '.env') });

const _base_app_url = process.env.APP_URL || 'http://127.0.0.1:8000';

// Function to fetch the active theme
async function __appActiveTheme() {
    try {
        const response = await axios.get(_base_app_url + '/api/get/settings/site_theme'); // Replace with your API endpoint
        return response.data.data.value || 'defaults';
    } catch (error) {
        console.error('Error fetching active theme:', error.message);
        return 'default';
    }
}

(async () => {
    const app_active_theme = await __appActiveTheme();

    // Path to the theme's webpack file
    const theme_mix_file = `public/assets/frontend/js/${app_active_theme}/webpack.mix.js`;

    if (fs.existsSync(theme_mix_file)) {
        console.warn(`Using webpack config for theme: [${app_active_theme}] from [${theme_mix_file}]`);
        require(`./${theme_mix_file}`); // Dynamically require the theme's webpack file
    } else {
        console.error(`Webpack file for theme [ ${app_active_theme} ] not found at [ ${theme_mix_file} ]`);
        process.exit(1);
    }
})();