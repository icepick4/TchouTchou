import { getFlags } from './functions.js';
import { SuccessModal } from './modal.js';
const script = document.querySelector('script[src*="footer.js"]');
const LANG_SUCCES_LOGOUT = document.querySelector("#lang #SUCCES_LOGOUT").innerHTML;
let flag = script.outerHTML;

if (getFlags(flag)[0] != ' ') {
	const deconnexionbutton = document.querySelector('#deconnexion');
	deconnexionbutton.onclick = () => {
		let modal = new SuccessModal(LANG_SUCCES_LOGOUT, null, 2);
		localStorage.clear();
		setTimeout(() => {
			window.location = 'index.php?page=logout';
		}, 2000);
	};
}
