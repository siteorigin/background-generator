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
                gray: {
                    50: '#b4b7be',
                    100: '#CCCFD5',
                    200: '#9A9FAC',
                    300: '#686F82',
                    400: '#E6E7EA',
                    500: '#353F58',
                    600: '#D2D5D7',
                    900: '#020F2F',
                },
                blue: {
                    100: '#E9F0FC',
                    200: '#3783F5'
                },
                red: {
                    100: '#FE4A75'
                }
            },
            height: {
                464: '464px'
            },
            maxWidth: {
                1096: '1096px',
                744: '744px'
            },
            borderRadius: {
                20: '1.25rem'
            },
            boxShadow: {
                xl: ' 0px -8px 32px rgba(0, 0, 0, 0.08)',
                lg: '0px -4px 12px rgba(0, 0, 0, 0.04)',
                md: '0px 8px 32px rgba(0, 0, 0, 0.08)',
                sm: '0px 0px 12px rgba(0, 0, 0, 0.06)'
            },
            fontSize: {
                13: '13px',
                15: '15px'
            }
        },
    },
    variants: {
        extend: {
            flex: ['hover', 'focus'],
        },
    },
    plugins: [
        require('@tailwindcss/aspect-ratio')
    ]
}
