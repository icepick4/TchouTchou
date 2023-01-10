import { getFlags } from './functions.js';
import { ConfirmModal } from './modal.js';
const script = document.querySelector('script[src*="ticket_single.js"]');
let flag = script.outerHTML;
const deleteButton = document.getElementById('delete-button');
const LANG_DELETE_TICKET = document.querySelector("#lang #DELETE_TICKET").innerHTML;
const LANG_DELETE_TICKET_QUESTION = document.querySelector("#lang #DELETE_TICKET_QUESTION").innerHTML;
const LANG_CONFIRM = document.querySelector("#lang #CONFIRM").innerHTML;
const LANG_CANCEL = document.querySelector("#lang #CANCEL").innerHTML;
let url = window.location.href;

deleteButton.addEventListener('click', function () {
	let confirm = new ConfirmModal(
		LANG_DELETE_TICKET,
		LANG_DELETE_TICKET_QUESTION,
		LANG_CONFIRM,
		LANG_CANCEL
	);
	document
		.querySelector('#btnmodal-0')
		.addEventListener('click', deleteTickets);
});

function deleteTickets() {
	console.log(url.slice(url.indexOf('&ticket=') + 8));
	var xhttp = new XMLHttpRequest();
	xhttp.open(
		'GET',
		'index.php?api=delete_ticket&ticket=' +
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
