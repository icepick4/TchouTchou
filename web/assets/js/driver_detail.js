import { SuccessModal } from './modal.js';
const btn_validate = document.querySelector("#SUBMIT");
const btn_delete = document.querySelector("#DELETE");
const LANG_ABILITIES_UPDATED = document.querySelector("#lang #ABILITIES_UPDATED").innerHTML;
const DRIVER_ID = document.querySelector("#lang #DRIVER_ID").innerHTML;
btn_validate.addEventListener('click',ev => 
	setDriverAbilites(getAbilitesValues()));
btn_delete.addEventListener('click', ev =>
	fireEmployee());

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

async function fireEmployee() {
	const URL = "index.php?api=fired_employee&user_id="+DRIVER_ID;
	console.log(URL)
	await fetch(URL);
	//window.location.replace("/index.php?page=staff")
}