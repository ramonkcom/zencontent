export function getPreferredTheme(): string {
  return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
}

export function getCurrentTheme(): string {
  return document.documentElement.dataset.theme || 'light'
}

export function getSavedTheme(): string {
  const theme = localStorage.getItem('theme');
  if (!theme) return getPreferredTheme();
  else return theme;
}

export function initControls(): void {
  const controls = document.querySelectorAll('.js-theme-switcher')
  controls.forEach(control => {
    control.addEventListener('click', (e) => {
      toggleTheme();
    });
  });
}

export function loadTheme(): void {
  const theme = getSavedTheme();
  if (!('theme' in localStorage)) localStorage.setItem('theme', theme);
  setTheme(theme);
  initControls();
}

export function setTheme(theme: string):string {
  const currentTheme = document.documentElement.dataset.theme || 'light';
  if (theme === currentTheme) return theme;

  document.documentElement.classList.remove(currentTheme);
  document.documentElement.classList.add(theme);
  document.documentElement.dataset.theme = theme;
  localStorage.setItem('theme', theme);
  return theme
}

export function toggleTheme():string {
  const newTheme = getCurrentTheme() === 'light' ? 'dark' : 'light';
  setTheme(newTheme);
  return newTheme
}