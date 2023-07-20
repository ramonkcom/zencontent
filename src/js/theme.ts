export function initControls(): void {
  const controls = document.querySelectorAll('.js-theme-switcher')
  controls.forEach(control => {
    control.addEventListener('click', (e) => {
      toggleTheme();
    });
  });
}

export function loadTheme(): void {
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
  const currentTheme = document.documentElement.dataset.theme || 'light';
  const newTheme = currentTheme === 'light' ? 'dark' : 'light';
  setTheme(newTheme);
  return newTheme
}