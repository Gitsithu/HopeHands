/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/views/**/*.blade.php", // Scans all Blade templates
      "./resources/js/**/*.js",          // Scans all JavaScript files
    ],
    theme: {
      extend: {}, // Extend the default theme here (optional)
    },
    plugins: [], // Add Tailwind plugins here (optional)
  }