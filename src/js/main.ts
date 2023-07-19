import { initControls as initMenuControls } from './menu';
import { loadHeader } from './header';
import { loadTheme } from './theme';

window.onload = function() {
  initMenuControls();
  loadTheme();
  loadHeader();
}