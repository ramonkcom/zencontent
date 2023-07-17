/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{php,html,js}"],
  darkMode: 'class',
  theme: {
    extend: {},
    fontFamily: {
      sans: ['IBM Plex Sans', 'sans-serif'],
      serif: ['Georgia', 'serif'],
      mono: ['IBM Plex Mono', 'monospace']
    },
  },
  plugins: [],
}

