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
                    "primary": "#4BA4F2",
                    "primary-content": "#ffffff",
                    "secondary": "#C3E8F5",
                    "secondary-content": "#DCECFC",
                    "accent": "#DCECFC",
                    "accent-content": "#001600",
                    "neutral": "#DCECFC",
                    "neutral-content": "#C3E8F5",
                    "base-100": "#ffffff",
                    "base-200": "#DCECFC",
                    "base-300": "#F6F6F6",
                    "base-content": "#151515",
                    "info": "#0000ff",
                    "info-content": "#DCECFC",
                    "success": "#DCECFC",
                    "success-content": "#001600",
                    "warning": "#DCECFC",
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
                "pg-primary": colors.blue,
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
