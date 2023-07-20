import { loadMenu } from './menu';
import { loadHeader } from './header';
import { loadTheme } from './theme';

window.onload = function() {
  loadMenu();
  loadHeader();
  loadTheme();
}