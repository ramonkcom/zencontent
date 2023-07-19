export function openMenu(e: Event) {
  document.body.style.overflow = 'hidden';
  document.querySelector('.js-menu-open')?.classList.add('hidden')
  document.querySelector('.js-menu-close')?.classList.remove('hidden')
  
  const menu: Element|null = document.querySelector('.js-menu')
  if (!menu) return;
  
  menu.classList.remove('hidden')
  menu.classList.add('block');
  setTimeout(() => menu.classList.remove('opacity-0'), 10)
}

export function closeMenu(e: Event) {
  document.body.style.overflow = '';
  document.querySelector('.js-menu-close')?.classList.add('hidden')
  document.querySelector('.js-menu-open')?.classList.remove('hidden')

  const menu: Element|null = document.querySelector('.js-menu')
  if (!menu) return;
  
  menu.classList.add('opacity-0');
  setTimeout(function() { 
    menu.classList.add('hidden');
  }, 150)
}

export function initControls() {
  document.querySelector('.js-menu-open')?.addEventListener('click', openMenu)
  document.querySelector('.js-menu-close')?.addEventListener('click', closeMenu)
}