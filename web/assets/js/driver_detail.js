import { SuccessModal,ConfirmModal } from './modal.js';
const btn_validate = document.querySelector("#SUBMIT");
const btn_delete = document.querySelector("#DELETE");
const DRIVER_ID = document.querySelector("#lang #DRIVER_ID").innerHTML;
const LANG_ABILITIES_UPDATED = document.querySelector("#lang #ABILITIES_UPDATED").innerHTML;
const LANG_CONFIRM = document.querySelector('div#lang #CONFIRM').innerHTML;
const LANG_CANCEL = document.querySelector('div#lang #CANCEL').innerHTML;
const LANG_FIRE_EMPLOYEE = document.querySelector('#lang #FIRE_EMPLOYEE').innerHTML;
const LANG_FIRE_EMPLOYEE_QUESTION = document.querySelector('#lang #FIRE_EMPLOYEE_QUESTION').innerHTML;
btn_validate.addEventListener('click',ev => 
	setDriverAbilites(getAbilitesValues()));
btn_delete.addEventListener('click', ev =>
	callbackFireEmployee());

//"index.php?fired_employee&" + "id=" + id + "&user_id="
function getAbilitesValues(){
	const list_checkbox = document.querySelectorAll("input");
	let res = {};

	for (var i = 0; i < list_checkbox.length; i++) {
		res[list_checkbox[i].value] = list_checkbox[i].checked;
	}
	return res;
}


function setDriverAbilites(data){
	let URL = "index.php?api=set_driver_abilities";

	Object.entries(data).forEach((tuple, value) => {
		URL = URL + "&ABILITIES["+tuple[0]+"]="+tuple[1];
	});

	console.log(URL);
	fetch(URL);
	showModale();

}

function showModale() {
	let modal = new SuccessModal(LANG_ABILITIES_UPDATED, null, 1.5);
}

function callbackFireEmployee() {
	let confirm = new ConfirmModal(
		LANG_FIRE_EMPLOYEE,
		LANG_FIRE_EMPLOYEE_QUESTION,
		LANG_CONFIRM,
		LANG_CANCEL
	);
	document
		.querySelector('#btnmodal-0')
		.addEventListener('click', fireEmployee);
}

async function fireEmployee() {
	const URL = "index.php?api=fired_employee&user_id="+DRIVER_ID;
	console.log(URL)
	await fetch(URL);
	window.location.replace("/index.php?page=staff")
}