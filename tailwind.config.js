/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                primary: '#123456',
                secondary: '#654321',
            },
            fontFamily: {
                sans: ['Nunito', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
