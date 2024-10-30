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
                textGreen: '#10B981',
                secondary: '#FFFFFF',
                bgColor: '#F3F4F6',
            },
            fontFamily: {
                sans: ['Nunito', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
