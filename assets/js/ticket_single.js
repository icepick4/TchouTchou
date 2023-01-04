import { getFlags } from './functions.js';
import { ConfirmModal } from './modal.js';
const script = document.querySelector('script[src*="ticket_single.js"]');
let flag = script.outerHTML;
let deleteButton = document.getElementById('delete-button');
let url = window.location.href;

deleteButton.addEventListener('click', function () {
	let confirm = new ConfirmModal(
		'Supprimer les tickets',
		'Êtes vous sûr de supprimer vos tickets ?',
		'Confirmer',
		'Annuler'
	);
	confirm.buttons[0].addEventListener('click', deleteTickets());
});

function deleteTickets() {
	console.log(url.slice(url.indexOf('&ticket=') + 8));
	var xhttp = new XMLHttpRequest();
	xhttp.open(
		'GET',
		'ajax/deleteTicket.php?ticket=' +
			url.slice(url.indexOf('&ticket=') + 8) +
			'&id=' +
			getFlags(flag)[0],
		true
	);
	xhttp.send();
	xhttp.onload = function () {
		if (this.status == 200) {
			window.location.href = '?page=ticket_list';
		}
	};
	xhttp.onerror = function () {
		window.location.href =
			'?page=ticket_single&ticket=' +
			url.slice(url.indexOf('&ticket=') + 8);
	};
}
