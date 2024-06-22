/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        'montserrat': ['Montserrat'],
        'lato': ['Lato'],
        'garamond': ['Garamond']
      },
      colors: {
        'custom-dark-choco': '#65451F',
        'custom-heavy-choco': '#765827',
        'custom-smoot-choco': '#C8AE7D',
        'custom-light-choco': '#EAC696',
      },
      height: {
        '927': '927px',
        'cus-15': '15px',
        'cus-200': '200px',
        'cus-50': '50px',
        'cus-400': '400px',
        'cus-100': '100px',
      },
      minHeight: {
        '0': '0',
        '50': '50px',
        '100': '100px',
        '200': '200px',
        '300': '300px',
        '400': '400px',
       },
       gridTemplateColumns: {
        // Simple 16 column grid
       'cus-3': 'repeat(4, minmax(0, 1fr))',
      },
        gridTemplateRows: {
          // Simple 8 row grid
         'layout-md': 'auto 100px minmax(700px, 1fr) 100px',
         'layout': 'auto 100px auto minmax(700px, 1fr) 100px'
        },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
