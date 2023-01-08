import { SuccessModal } from './modal.js';

const deconnexionbutton = document.querySelector('#deconnexion');
deconnexionbutton.onclick = () => {
	let modal = new SuccessModal('Successfully logout', null, 2);
	localStorage.clear();
	setTimeout(() => {
		window.location = 'index.php?page=logout';
	}, 2000);
};
