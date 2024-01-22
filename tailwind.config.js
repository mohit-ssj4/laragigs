/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            "space-grotesk": ["Space Grotesk", "sans-serif"]
        },
        extend: {},
    },
    plugins: [],
}
