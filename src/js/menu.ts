export function closeMenu(e: Event) {
  document.body.style.overflow = '';
  const menu: HTMLElement|null = document.querySelector('.js-menu')
  if (!menu) return;
  
  menu.classList.add('opacity-0');
  setTimeout(function() { 
    menu.classList.add('hidden');
  }, 200)
}

export function initControls() {
  const menuButtons: HTMLElement[] = Array.from(document.querySelectorAll('.js-menu-toggle'));
  for (let i=0; i<menuButtons.length; i++) {
    menuButtons[i].addEventListener('click', toggleMenu)
  }
}

export function loadMenu() {
  initControls();
}

export function openMenu(e: Event) {
  document.body.style.overflow = 'hidden';  
  const menu: HTMLElement|null = document.querySelector('.js-menu')
  if (!menu) return;
  
  menu.classList.remove('hidden')
  menu.classList.add('block');
  setTimeout(() => menu.classList.remove('opacity-0'), 10)
}

export function toggleMenu(e: Event) {
  const buttonIcons: HTMLElement[] = Array.from(document.querySelectorAll('.js-menu-toggle span'));
  for (let i=0; i<buttonIcons.length; i++) {
    buttonIcons[i].classList.toggle('hidden')
  }

  const menu: HTMLElement|null = document.querySelector('.js-menu')
  if (!menu) return;

  if (menu.classList.contains('hidden')) {
    openMenu(e);
  } else {
    closeMenu(e);
  }
}