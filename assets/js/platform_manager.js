const in_station_name = document.querySelector("select#station_name");
const in_hub = document.querySelector("select#hub_id")
let req;
in_station_name.addEventListener("change",function(event) {
	 load_hub_op(in_station_name.value);
})


async function load_hub_op(name) {
	console.log(name);
	const rep = await fetch("index.php?page=platform_manager&station_name="+name);
	//console.log(await rep.text())
	let data = await rep.json();
	data = await JSON.parse(data);
	
		in_hub.innerHTML = "";
		console.log(data,data.hub,typeof(data))
		for (var i = 0; i < data["hub"].length; i++) {
			let tmp_option = document.createElement("option")
			tmp_option.innerHTML = data["hub"][i];
			in_hub.appendChild(tmp_option)
			
		}

	

}


load_hub_op(in_station_name.value)