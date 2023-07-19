export function loadHeader() {
  const header:HTMLElement|null = document.querySelector('.js-main-header')
  if (!header) return;
  
  const headerClone = header.cloneNode(true) as HTMLElement;
  headerClone.classList.add('js-main-header--clone', 'fixed', 'w-full', 'top-0');
  headerClone.style.opacity = '0';
  headerClone.style.display = 'none';
  window.document.body.prepend(headerClone);

  let lastScrollPos = 0;
  let scrollTimeout: NodeJS.Timeout|null = null;
  let headerTimeout: NodeJS.Timeout|null = null;

  window.onscroll = function() {
    if (scrollTimeout) clearTimeout(scrollTimeout);
    
    scrollTimeout = setTimeout(function(){
      if (window.scrollY >= lastScrollPos) {
        headerClone.style.opacity = '0';
        headerTimeout = setTimeout(function(){
          headerClone.style.display = 'none';
        }, 200);
      } else if (window.scrollY < lastScrollPos && window.scrollY > window.innerHeight) {
        headerClone.style.display = 'flex';
        headerTimeout = setTimeout(function(){
          headerClone.style.opacity = '100';
        }, 10);
      }
      
      lastScrollPos = window.scrollY;
    }, 10);
  }
}