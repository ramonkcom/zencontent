import { loadMenu } from './menu';
import { loadHeader } from './scroll';
import { loadTheme } from './theme';

window.onload = function() {
  loadMenu();
  loadHeader();
  loadTheme();
}