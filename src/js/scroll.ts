export function loadScrollToTop(): HTMLElement|null  {   
  const scrollToTop:HTMLElement|null = document.querySelector('.js-scroll-to-top');
  if (!scrollToTop) return null;

  scrollToTop.addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  return scrollToTop;
}

export function loadHeader(): HTMLElement|null {
  const header:HTMLElement|null = document.querySelector('.js-main-header')
  if (!header) return null;
  
  const headerClone = header.cloneNode(true) as HTMLElement;
  headerClone.classList.add('js-main-header--clone', 'fixed', 'w-full', 'top-0');
  headerClone.style.opacity = '0';
  headerClone.style.display = 'none';
  window.document.body.prepend(headerClone);

  return headerClone;
}

export function loadScroll() {
  const headerClone:HTMLElement|null = loadHeader();
  const scrollToTop:HTMLElement|null = loadScrollToTop();

  let lastScrollPos = 0;
  let scrollTimeout: NodeJS.Timeout|null = null;

  window.onscroll = function() {
    if (scrollTimeout) clearTimeout(scrollTimeout);

    scrollTimeout = setTimeout(function(){
      if (scrollToTop) {
        if (window.scrollY > window.innerHeight) {
          scrollToTop.style.opacity = '100';
        } else {
          scrollToTop.style.opacity = '0';
        }
      }

      if (headerClone) {
        if (window.scrollY >= lastScrollPos) {
          headerClone.style.opacity = '0';
          setTimeout(function(){
            headerClone.style.display = 'none';
          }, 200);
        } else if (window.scrollY < lastScrollPos && window.scrollY > window.innerHeight) {
          headerClone.style.display = 'flex';
          setTimeout(function(){
            headerClone.style.opacity = '100';
          }, 10);
        }
      }
          
      lastScrollPos = window.scrollY;
    }, 10);
  }
}