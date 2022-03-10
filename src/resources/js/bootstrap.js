import 'bootstrap';
import 'toastr';

const axios = require('axios');

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

axios.interceptors.request.use(function (config) {
	// Do something before request is sent

	document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
	document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());

	return config;
}, function (error) {
	// Do something with request error
	return Promise.reject(error);
});

axios.interceptors.response.use(function (response) {
	// Any status code that lie within the range of 2xx cause this function to trigger
	// Do something with response data
	return response;
}, function (error) {
	console.log(error.response);
	// Any status codes that falls outside the range of 2xx cause this function to trigger
	// Do something with response error
	let response = error.response;

	if (response.status == 422) {
		for (let key in response?.data?.errors) {
			let message = response.data.errors[key][0];

			const el = document.querySelector(`#orderManagement [name="${key}"]`);

			if (el) {
				el.classList.add('is-invalid');

				let span = document.createElement('span');

				span.classList.add('invalid-feedback');

				span.setAttribute('role', 'alert');

				span.innerHTML = `<strong>${message}</strong>`;

				el.after(span);
			}
		}
	}

	return Promise.reject(error);
});