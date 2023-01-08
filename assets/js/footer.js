import { getFlags } from './functions.js';
import { SuccessModal } from './modal.js';
const script = document.querySelector('script[src*="footer.js"]');
let flag = script.outerHTML;

if (getFlags(flag)[0] != ' ') {
	const deconnexionbutton = document.querySelector('#deconnexion');
	deconnexionbutton.onclick = () => {
		let modal = new SuccessModal('Successfully logout', null, 2);
		localStorage.clear();
		setTimeout(() => {
			window.location = 'index.php?page=logout';
		}, 2000);
	};
}
