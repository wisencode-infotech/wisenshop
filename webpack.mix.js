const fs = require('fs');

const app_active_theme = 'default';

// Path to the theme's webpack file
const theme_mix_file = `public/assets/frontend/js/${app_active_theme}/webpack.mix.js`;

if (fs.existsSync(theme_mix_file)) {
    console.warn(`Using webpack config for theme: [${app_active_theme}] from [${theme_mix_file}]`);
    require(`./${theme_mix_file}`); // Dynamically require the theme's webpack file
} else {
    console.error(`Webpack file for theme [ ${app_active_theme} ] not found at [ ${theme_mix_file} ]`);
    process.exit(1);
}
