@php
    $active_theme = __appActiveTheme();    
@endphp

<style type="text/css">
:root {
    --color-accent-rgb: {{ __convertHexToRgb(__setting('color-accent')) }};
    --color-accent: {{ __setting('color-accent') }};
    
    --color-accent-hover-rgb : {{ __convertHexToRgb(__setting('color-accent-hover')) }};
    --color-accent-hover : {{ __setting('color-accent-hover') }};

    --color-accent-contrast : {{ __setting('color-accent-contrast') }};

    --color-accent-200-rgb : {{ __convertHexToRgb(__setting('color-accent-200')) }};
    --color-accent-200 : {{ __setting('color-accent-200') }};
    --color-accent-300-rgb : {{ __convertHexToRgb(__setting('color-accent-300')) }};
    --color-accent-300 : {{ __setting('color-accent-300') }};
    --color-accent-400-rgb : {{ __convertHexToRgb(__setting('color-accent-400')) }};
    --color-accent-400 : {{ __setting('color-accent-400') }};
    --color-accent-500-rgb : {{ __convertHexToRgb(__setting('color-accent-500')) }};
    --color-accent-500 : {{ __setting('color-accent-500') }};
    --color-accent-600-rgb : {{ __convertHexToRgb(__setting('color-accent-600')) }};
    --color-accent-600 : {{ __setting('color-accent-600') }};
    --color-accent-700-rgb : {{ __convertHexToRgb(__setting('color-accent-700')) }};
    --color-accent-700 : {{ __setting('color-accent-700') }};
    
    --color-light-rgb : {{ __convertHexToRgb(__setting('color-light')) }};
    --color-light: {{ __setting('color-light') }};
    
    --color-dark-rgb: {{ __convertHexToRgb(__setting('color-dark')) }};
    --color-dark: {{ __setting('color-dark') }};

    --color-muted-black-rgb: {{ __convertHexToRgb(__setting('color-muted-black')) }};
    --color-muted-black: {{ __setting('color-muted-black') }};

    --color-current: currentColor;

    --text-base-rgb: 107, {{ __convertHexToRgb(__setting('text-base')) }};
    --text-base: {{ __setting('text-base') }};

    --text-base-dark-rgb: {{ __convertHexToRgb(__setting('text-base-dark')) }};
    --text-base-dark: {{ __setting('text-base-dark') }};

    --text-muted-rgb: {{ __convertHexToRgb(__setting('text-muted')) }};
    --text-muted: {{ __setting('text-muted') }};
    
    --text-muted-light-rgb: {{ __convertHexToRgb(__setting('text-muted-light')) }};
    --text-muted-light-rgb: {{ __setting('text-muted-light') }};

    --text-sub-heading-rgb: {{ __convertHexToRgb(__setting('text-sub-heading')) }};
    --text-sub-heading: {{ __setting('text-sub-heading') }};

    --text-heading-rgb: {{ __convertHexToRgb(__setting('text-heading')) }};
    --text-heading: {{ __setting('text-heading') }};

    --text-bolder-rgb: {{ __convertHexToRgb(__setting('text-bolder')) }};
    --text-bolder: {{ __setting('text-bolder') }};

    --color-border-50-rgb: {{ __convertHexToRgb(__setting('color-border-50')) }};
    --color-border-50: {{ __setting('color-border-50') }};

    --color-border-100-rgb: {{ __convertHexToRgb(__setting('color-border-100')) }};
    --color-border-100: {{ __setting('color-border-100') }};
    
    --color-border-200-rgb: {{ __convertHexToRgb(__setting('color-border-200')) }};
    --color-border-200: {{ __setting('color-border-200') }};

    --color-border-base-rgb: {{ __convertHexToRgb(__setting('color-border-base')) }};
    --color-border-base: {{ __setting('color-border-base') }};

    --color-border-400-rgb: {{ __convertHexToRgb(__setting('color-border-400')) }};
    --color-border-400: {{ __setting('color-border-400') }};

    --color-gray-50: 249, 250, 251;
    --color-gray-100: 243, 244, 246;
    --color-gray-200: 229, 231, 235;
    --color-gray-300: 209, 213, 219;
    --color-gray-400: 156, 163, 175;
    --color-gray-500: 107, 114, 128;
    --color-gray-600: 75, 85, 99;
    --color-gray-700: 55, 65, 81;
    --color-gray-800: 31, 41, 55;
    --color-gray-900: 31, 41, 55;
    --color-orange-50: 255, 247, 237;
    --color-orange-100: 255, 237, 213;
    --color-orange-200: 254, 215, 170;
    --color-orange-300: 253, 186, 116;
    --color-orange-400: 251, 146, 60;
    --color-orange-500: 249, 115, 22;
    --color-orange-600: 234, 88, 12;
    --color-orange-700: 194, 65, 12;
    --color-orange-800: 154, 52, 18;
    --color-orange-900: 124, 45, 18;
    --color-pending: 201, 161, 22;
    --color-processing: 158, 117, 0;
    --color-complete: 0, 161, 127;
    --color-canceled: 227, 110, 1;
    --color-failed: 238, 43, 0;
    --color-out-for-delivery: 126, 173, 66;
    --text-base-dark: 51, 51, 51;
    --h1: 2.5rem;
    --h2: 2rem;
    --h3: 1.5rem;
    --h4: 1.25rem;
    --h5: 1.125rem;
    --h6: 1rem
}

/* General Text Colors */
.theme-{{ $active_theme }}-text-accent {
    color: var(--color-accent);
}

.theme-{{ $active_theme }}-text-accent-hover:hover {
    color: var(--color-accent-hover);
}

.theme-{{ $active_theme }}-text-accent-contrast {
    color: var(--color-accent-contrast);
}

.theme-{{ $active_theme }}-text-muted {
    color: var(--text-muted);
}

.theme-{{ $active_theme }}-text-muted-light {
    color: var(--text-muted-light);
}

.theme-{{ $active_theme }}-text-sub-heading {
    color: var(--text-sub-heading);
}

.theme-{{ $active_theme }}-text-heading {
    color: var(--text-heading);
}

.theme-{{ $active_theme }}-text-bolder {
    color: var(--text-bolder);
}

/* Background Colors */
.theme-{{ $active_theme }}-bg-accent {
    background-color: var(--color-accent);
}

.theme-{{ $active_theme }}-bg-accent-hover:hover {
    background-color: var(--color-accent-hover);
}

.theme-{{ $active_theme }}-bg-light {
    background-color: var(--color-light);
}

.theme-{{ $active_theme }}-bg-dark {
    background-color: var(--color-dark);
}

.theme-{{ $active_theme }}-bg-gray-100 {
    background-color: var(--color-gray-100);
}

.theme-{{ $active_theme }}-bg-gray-200 {
    background-color: var(--color-gray-200);
}

/* Border Colors */
.theme-{{ $active_theme }}-border-accent {
    border-color: var(--color-accent);
}

.theme-{{ $active_theme }}-border-light {
    border-color: var(--color-border-50);
}

.theme-{{ $active_theme }}-border-dark {
    border-color: var(--color-border-base);
}

.theme-{{ $active_theme }}-border-gray-100 {
    border-color: var(--color-gray-100);
}

.theme-{{ $active_theme }}-border-gray-200 {
    border-color: var(--color-gray-200);
}

/* Text Sizes */
.theme-{{ $active_theme }}-text-h1 {
    font-size: var(--h1);
}

.theme-{{ $active_theme }}-text-h2 {
    font-size: var(--h2);
}

.theme-{{ $active_theme }}-text-h3 {
    font-size: var(--h3);
}

.theme-{{ $active_theme }}-text-h4 {
    font-size: var(--h4);
}

.theme-{{ $active_theme }}-text-h5 {
    font-size: var(--h5);
}

.theme-{{ $active_theme }}-text-h6 {
    font-size: var(--h6);
}

/* Hover States */
.theme-{{ $active_theme }}-.hover-bg-accent:hover {
    background-color: var(--color-accent-hover);
}

.theme-{{ $active_theme }}-.hover-text-accent:hover {
    color: var(--color-accent-hover);
}

</style>