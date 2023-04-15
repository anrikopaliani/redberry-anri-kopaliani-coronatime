/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'input-color-default': '#E6E6E7',
        'brand-primary': "#2029F3",
        'form-btn-color': "#0FBA68" 
      }
    },
  },
  plugins: [],
}

