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
                    "primary": "#6D206E",
                    "primary-content": "#ffffff",
                    "secondary": "#ff00ff",
                    "secondary-content": "black",
                    "accent": "#00ff00",
                    "accent-content": "#001600",
                    "neutral": "#ff00ff",
                    "neutral-content": "#160016",
                    "base-100": "#ffffff",
                    "base-200": "#d6d6d6",
                    "base-300": "#F6F6F6",
                    "base-content": "#151515",
                    "info": "#0000ff",
                    "info-content": "#c6dbff",
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
