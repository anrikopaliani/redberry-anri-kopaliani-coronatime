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
        'form-btn-color': "#0FBA68",
        'brand-tertiary': "#EAD621",
        'table-color': "#F6F6F7",
        'success': "#249E2C",
      },
      fontFamily: {
        'inter': ['Inter']
      },
      backgroundOpacity: {
        '0.08': '0.08'
      },
      minHeight: {
        '49': '49px'
      },
      spacing: {
        '650': '650px',
        '70' : '70px'
      }
    },
  },
  plugins: [],
  variants: {
    extend: {
      backgroundOpacity: ['active'],
    }
  }
}

