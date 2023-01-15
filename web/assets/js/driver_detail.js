const btn_validate = document.querySelector("#SUBMIT");
const btn_delete = document.querySelector("#DELETE");
const driver_id = document.querySelector("#title").name;
console.log("driver_id", name,document.querySelector("#title"),
	document.querySelector("#title").name)

btn_validate.addEventListener('click',ev => 
	setDriverAbilites(getAbilitesValues()));



function getAbilitesValues(){
	const list_checkbox = document.querySelectorAll("input");

	let res = {};
	for (var i = 0; i < list_checkbox.length; i++) {
		res[list_checkbox[i].value] = list_checkbox[i].checked;
	}

	console.log(res);

	return res;
}


function setDriverAbilites(data){

	let URL = "index.php?api=set_driver_abilities";

	Object.entries(data).forEach((tuple, value) => {
		console.log(tuple,value)
		URL = URL + "&ABILITIES["+tuple[0]+"]="+tuple[1];

	});



	console.log(URL);
	fetch(URL);

}

