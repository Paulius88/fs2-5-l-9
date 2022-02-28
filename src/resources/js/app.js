require('./bootstrap');

import Alpine from 'alpinejs';

document.addEventListener('DOMContentLoaded', function() {
	if (typeof _MENU !== 'undefined') {
		document.querySelector(`[data-page="${_MENU}"]`)?.classList.add('fw-bold');
	}

	// const form = document.querySelector('form');

	// document.querySelector('#category').addEventListener('change', function() {
	// 	form.submit();
	// });
});

window.Alpine = Alpine;

Alpine.start();
