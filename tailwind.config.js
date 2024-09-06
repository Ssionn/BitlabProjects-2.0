/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            fontFamily: {
                'suse': ['Suse', 'sans-serif'],
            },
            keyframes: {
                fadeIn: {
                    '0%': {opacity: 0},
                    '100%': {opacity: 1},
                },
            },
            animation: {
                fadeIn: 'fadeIn 1.2s ease-in-out',
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
