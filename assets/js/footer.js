import { SuccessModal } from './modal.js';

deconnexion = document.querySelector('#deconnexion');
deconnexion.addEventListener('click', function () {
	console.log('deconnexion');
	let modal = new SuccessModal('Successfully logout', null, 2);
	localStorage.clear();
	setTimeout(() => {
		window.location = 'index.php?page=logout';
	}, 2000);
});
