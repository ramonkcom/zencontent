/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  darkMode: 'class',
  theme: {
    extend: {},
    fontFamily: {
      sans: ['IBM Plex Sans', 'sans-serif'],
      serif: ['Times New Roman', 'Georgia', 'serif'],
      mono: ['IBM Plex Mono', 'monospace']
    }
  },
  plugins: [],
}

