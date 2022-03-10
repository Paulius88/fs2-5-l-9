require('./bootstrap');

document.addEventListener('DOMContentLoaded', function() {
	if (typeof _MENU !== 'undefined') {
		document.querySelector(`[data-page="${_MENU}"]`)?.classList.add('fw-bold');
	}

	// document.querySelector('[data-bs-target="#orderManagement"]').click();

	require('./orderManagement');
});