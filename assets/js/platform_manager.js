const in_station_name = document.querySelector('select#station_name');
const in_hub = document.querySelector('select#hub_id');
let req;
in_station_name.addEventListener('change', function (event) {
	in_hub.innerHTML = '';
	in_hub.classList.add("loading")
    load_hub_op(in_station_name.value);

});

async function load_hub_op(name) {
    //console.log(name);
    const rep = await fetch(
        'index.php?page=platform_manager&station_name=' + name
    );

    let data = await rep.json();
    //console.log(data)

    in_hub.innerHTML = '';
    for (var i = 0; i < data['hub'].length; i++) {
        let tmp_option = document.createElement('option');
        tmp_option.innerHTML = data['hub'][i];
        in_hub.appendChild(tmp_option);
    }
    in_hub.classList.remove("loading")
}

load_hub_op(in_station_name.value)
