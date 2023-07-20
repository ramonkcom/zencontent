import { loadMenu } from './menu';
import { loadScroll } from './scroll';
import { loadTheme } from './theme';

window.onload = function() {
  loadMenu();
  loadScroll();
  loadTheme();
}