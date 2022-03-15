const axios = require('axios');
const toastr = require('toastr');
const bootstrap = require('bootstrap');

const divOrderManagementModal = document.querySelector('#orderManagement');

if (divOrderManagementModal) {
	const orderManagementModal = new bootstrap.Modal(divOrderManagementModal, {
		keyboard: false
	});

	// orderManagementModal.show();

	document.querySelector('#orderSave').addEventListener('click', async function() {
		let data = {};

		// [...orderManagementModal.querySelectorAll('[name]')].forEach(e => data[e.name] = e.value);
		divOrderManagementModal.querySelectorAll('[name]').forEach(e => data[e.name] = e.value);

		let response = await axios.post('/orders/save', data);

		if (response) {
			toastr.success('ORDER CREATED!');

			orderManagementModal.hide();

			setTimeout(() => {
				window.location.reload();
			}, 1000);
		}
	});
}