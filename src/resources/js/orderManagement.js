const orderManagementModal = document.querySelector('#orderManagement');

document.querySelector('#orderSave').addEventListener('click', function() {
	let data = {};

	// [...orderManagementModal.querySelectorAll('[name]')].forEach(e => data[e.name] = e.value);
	orderManagementModal.querySelectorAll('[name]').forEach(e => data[e.name] = e.value);

	console.log(data);
});