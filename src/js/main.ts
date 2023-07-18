import { initControls as initMenuControls } from './menu';
import { loadTheme } from './theme';

window.onload = function() {
  initMenuControls();
  loadTheme();
}