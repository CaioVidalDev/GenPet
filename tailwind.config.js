import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import daisyui from 'daisyui';

const colors = require('tailwindcss/colors');

export default {
    darkMode: 'class',
    presets: [
        require("./vendor/power-components/livewire-powergrid/tailwind.config.js"),
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',

        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
    ],

    daisyui: {
        themes: [{
                'light': {
                    "primary": "#e0aaff",
                    "primary-content": "#ffffff",
                    "secondary": "#e5b3fe",
                    "secondary-content": "#ffd6ff",
                    "accent": "#00ff00",
                    "accent-content": "#001600",
                    "neutral": "#ffd6ff",
                    "neutral-content": "#e5b3fe",
                    "base-100": "#ffffff",
                    "base-200": "#ffd6ff",
                    "base-300": "#F6F6F6",
                    "base-content": "#151515",
                    "info": "#0000ff",
                    "info-content": "#ffd6ff",
                    "success": "#00ff00",
                    "success-content": "#001600",
                    "warning": "#00ff00",
                    "warning-content": "#001600",
                    "error": "#ff0000",
                    "error-content": "#160000",
                }
            },
            {
                
            }
        ]
    },

    theme: {
        extend: {
            colors: {
                "pg-primary": colors.fuchsia,
            },
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
                serif: ['Montserrat', ...defaultTheme.fontFamily.serif]
            },
        },
    },

    plugins: [
        // forms,
        require("daisyui")
    ],
};
