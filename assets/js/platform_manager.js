const in_station_name = document.querySelector('select#station_name');
const in_hub = document.querySelector('select#hub_id');
const tmp_plat_list = document.querySelector('.tmp_list_platform')
const temp_plat = document.querySelector('template.template');
let req;

in_station_name.addEventListener('change', function (event) {
	in_hub.innerHTML = '';
	in_hub.classList.add("loading")
    load_hub_op(in_station_name.value)
    .then(function(ev) {
    load_platform(in_station_name.value, in_hub.value)
})

});

async function load_hub_op(id) {
    const rep = await fetch(
        'index.php?page=platform_manager&station_name=' + id
    );

    let data = await rep.json();


    in_hub.innerHTML = '';
    for (var i = 0; i < data['hub'].length; i++) {
        let tmp_option = document.createElement('option');
        tmp_option.innerHTML = data['hub'][i];
        in_hub.appendChild(tmp_option);
    }
    in_hub.classList.remove("loading")
}

async function load_platform(station_id,hub) {

    const rep = await fetch(
        'index.php?page=platform_manager&station_name=' + station_id
        +'&hub_id='+hub
    );

    let data = await rep.json();

    tmp_plat_list.innerHTML ="";
    for (var i = 0; i < data['platforms'].length; i++) {
        let tmp_option = temp_plat.content.cloneNode(true);
        tmp_option.querySelector("p").innerHTML = 
        data['platforms'][i]['PLATFORM_LETTER'] +" status= "
        +data['platforms'][i]['PLATFORM_STATUS'] +" user= "
        +data['platforms'][i]['PLATFORM_USER'] +" utilisation= "
        +data['platforms'][i]['PLATFORM_UTILISATION'];
        tmp_plat_list.appendChild(tmp_option);
    }
    
}

load_hub_op(in_station_name.value)
.then(function(ev) {
    load_platform(in_station_name.value, in_hub.value)
})

