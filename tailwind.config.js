const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
     './resources/**/*.blade.php',
     './resources/**/*.js',
     './resources/**/*.vue',
   ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                'source-sans-pro': ['Source Sans Pro'],
                'mitr': ['Mitr'],
                'roboto-slab': ['Roboto Slab'],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],


};


