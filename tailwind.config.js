/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  darkMode: 'class',
  theme: {
    extend: {},
    fontFamily: {
      sans: ['Libre Franklin', 'sans-serif'],
      serif: ['PT Serif', 'serif'],
      mono: ['monospace'],
    }
  },
  plugins: [],
}

