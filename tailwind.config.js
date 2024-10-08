import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                blue: '#00376d',
                blueFigma: '#173AD7',
                lblue:'#C5D7FF',
            },
            fontSize: {
                'nano': ['14px', '0.875rem'],    // $font-size-nano
                'xxs': ['16px', '1rem'],         // $font-size-xxs
                'xs': ['20px', '1.25rem'],       // $font-size-xs
                'sm': ['24px', '1.5rem'],        // $font-size-sm
                'md': ['28px', '1.75rem'],       // $font-size-md
                'lg': ['36px', '2.25rem'],       // $font-size-lg
            },
            fontWeight: {
                '300': '300',  // $font-weight-300
                '400': '400',  // $font-weight-400
                '500': '500',  // $font-weight-500
                '700': '700',  // $font-weight-700
            },
            textDecoration: {
                'none': 'none',                // $font-decorate-none
                'underline': 'underline',      // $font-decorate-underline
                'strikethrough': 'line-through',  // $font-decorate-Strikethrough
            },
        },
    },

    plugins: [forms],
};
