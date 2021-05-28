const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            gridTemplateRows: {
                'layout': 'auto 1fr auto'
            },
            colors: {
                gray: colors.coolGray,
                blue: colors.lightBlue
            },
            height: {
                137: '137px'
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
