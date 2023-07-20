/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/main.ts":
/*!************************!*\
  !*** ./src/js/main.ts ***!
  \************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

eval("\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\nvar menu_1 = __webpack_require__(/*! ./menu */ \"./src/js/menu.ts\");\nvar scroll_1 = __webpack_require__(/*! ./scroll */ \"./src/js/scroll.ts\");\nvar theme_1 = __webpack_require__(/*! ./theme */ \"./src/js/theme.ts\");\nwindow.onload = function () {\n    (0, menu_1.loadMenu)();\n    (0, scroll_1.loadHeader)();\n    (0, theme_1.loadTheme)();\n};\n\n\n//# sourceURL=webpack:///./src/js/main.ts?");

/***/ }),

/***/ "./src/js/menu.ts":
/*!************************!*\
  !*** ./src/js/menu.ts ***!
  \************************/
/***/ ((__unused_webpack_module, exports) => {

eval("\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\nexports.openMenu = exports.loadMenu = exports.initControls = exports.closeMenu = void 0;\nfunction closeMenu(e) {\n    var _a, _b;\n    document.body.style.overflow = '';\n    (_a = document.querySelector('.js-menu-close')) === null || _a === void 0 ? void 0 : _a.classList.add('hidden');\n    (_b = document.querySelector('.js-menu-open')) === null || _b === void 0 ? void 0 : _b.classList.remove('hidden');\n    var menu = document.querySelector('.js-menu');\n    if (!menu)\n        return;\n    menu.classList.add('opacity-0');\n    setTimeout(function () {\n        menu.classList.add('hidden');\n    }, 150);\n}\nexports.closeMenu = closeMenu;\nfunction initControls() {\n    var _a, _b;\n    (_a = document.querySelector('.js-menu-open')) === null || _a === void 0 ? void 0 : _a.addEventListener('click', openMenu);\n    (_b = document.querySelector('.js-menu-close')) === null || _b === void 0 ? void 0 : _b.addEventListener('click', closeMenu);\n}\nexports.initControls = initControls;\nfunction loadMenu() {\n    initControls();\n}\nexports.loadMenu = loadMenu;\nfunction openMenu(e) {\n    var _a, _b;\n    document.body.style.overflow = 'hidden';\n    (_a = document.querySelector('.js-menu-open')) === null || _a === void 0 ? void 0 : _a.classList.add('hidden');\n    (_b = document.querySelector('.js-menu-close')) === null || _b === void 0 ? void 0 : _b.classList.remove('hidden');\n    var menu = document.querySelector('.js-menu');\n    if (!menu)\n        return;\n    menu.classList.remove('hidden');\n    menu.classList.add('block');\n    setTimeout(function () { return menu.classList.remove('opacity-0'); }, 10);\n}\nexports.openMenu = openMenu;\n\n\n//# sourceURL=webpack:///./src/js/menu.ts?");

/***/ }),

/***/ "./src/js/scroll.ts":
/*!**************************!*\
  !*** ./src/js/scroll.ts ***!
  \**************************/
/***/ ((__unused_webpack_module, exports) => {

eval("\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\nexports.loadHeader = void 0;\nfunction loadHeader() {\n    var header = document.querySelector('.js-main-header');\n    if (!header)\n        return;\n    var headerClone = header.cloneNode(true);\n    headerClone.classList.add('js-main-header--clone', 'fixed', 'w-full', 'top-0');\n    headerClone.style.opacity = '0';\n    headerClone.style.display = 'none';\n    window.document.body.prepend(headerClone);\n    var lastScrollPos = 0;\n    var scrollTimeout = null;\n    var headerTimeout = null;\n    window.onscroll = function () {\n        if (scrollTimeout)\n            clearTimeout(scrollTimeout);\n        scrollTimeout = setTimeout(function () {\n            if (window.scrollY >= lastScrollPos) {\n                headerClone.style.opacity = '0';\n                headerTimeout = setTimeout(function () {\n                    headerClone.style.display = 'none';\n                }, 200);\n            }\n            else if (window.scrollY < lastScrollPos && window.scrollY > window.innerHeight) {\n                headerClone.style.display = 'flex';\n                headerTimeout = setTimeout(function () {\n                    headerClone.style.opacity = '100';\n                }, 10);\n            }\n            lastScrollPos = window.scrollY;\n        }, 10);\n    };\n}\nexports.loadHeader = loadHeader;\n\n\n//# sourceURL=webpack:///./src/js/scroll.ts?");

/***/ }),

/***/ "./src/js/theme.ts":
/*!*************************!*\
  !*** ./src/js/theme.ts ***!
  \*************************/
/***/ ((__unused_webpack_module, exports) => {

eval("\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\nexports.toggleTheme = exports.setTheme = exports.loadTheme = exports.initControls = void 0;\nfunction initControls() {\n    var controls = document.querySelectorAll('.js-theme-switcher');\n    controls.forEach(function (control) {\n        control.addEventListener('click', function (e) {\n            toggleTheme();\n        });\n    });\n}\nexports.initControls = initControls;\nfunction loadTheme() {\n    initControls();\n}\nexports.loadTheme = loadTheme;\nfunction setTheme(theme) {\n    var currentTheme = document.documentElement.dataset.theme || 'light';\n    if (theme === currentTheme)\n        return theme;\n    document.documentElement.classList.remove(currentTheme);\n    document.documentElement.classList.add(theme);\n    document.documentElement.dataset.theme = theme;\n    localStorage.setItem('theme', theme);\n    return theme;\n}\nexports.setTheme = setTheme;\nfunction toggleTheme() {\n    var currentTheme = document.documentElement.dataset.theme || 'light';\n    var newTheme = currentTheme === 'light' ? 'dark' : 'light';\n    setTheme(newTheme);\n    return newTheme;\n}\nexports.toggleTheme = toggleTheme;\n\n\n//# sourceURL=webpack:///./src/js/theme.ts?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/js/main.ts");
/******/ 	
/******/ })()
;