const in_station_name = document.querySelector('select#station_name');
const in_hub = document.querySelector('select#hub_id');
const plat_list = document.querySelector('.list_quai')
//const temp_plat = document.querySelector('template.template');
let req;
const temp_plat = document.querySelector('template#platforms');

// imported js

const start_pod = document.querySelector("div.start");
const end_pod = document.querySelector("div.finish");
const temp_connection = document.querySelector("template#connection");
const aiguillage = document.querySelector(".suport_rail #connection-liste")
const actif = document.querySelectorAll("button.btn_actif");
const ref = document.querySelector("div#reference");
const off_set = 15;

in_station_name.addEventListener('change', function (event) {
    load()
});

in_hub.addEventListener('change', function (event) {
    change_hub()
});

addEventListener('resize', (event) => {update_line()});


function build_all_connection(){
    console.log("start building connection")
    const quais = document.querySelectorAll(".quai");
    aiguillage.innerHTML = "";
    quais.forEach(build_connection);
}


function build_connection(cible) {
    const start = temp_connection.content.cloneNode(true);
    const end = temp_connection.content.cloneNode(true);

    start.querySelector("svg")._start = start_pod;
    start.querySelector("svg")._to = cible;

    end.querySelector("svg")._start = cible;
    end.querySelector("svg")._to = end_pod;

    update_connection(start.querySelector("svg"));
    update_connection(end.querySelector("svg"));
    aiguillage.appendChild(start);
    aiguillage.appendChild(end);


}


function update_connection(el) {
    const from = el._start;
    const to = el._to;
    const off_set_y = ref.getBoundingClientRect().y;
    let arrow = el.querySelector("line");
    arrow.x1.baseVal.value = from.getBoundingClientRect().x + from.getBoundingClientRect().width - off_set ;
    arrow.y1.baseVal.value = from.getBoundingClientRect().y + (from.getBoundingClientRect().height /2) - off_set_y;

    arrow.x2.baseVal.value = to.getBoundingClientRect().x - off_set;
    arrow.y2.baseVal.value = to.getBoundingClientRect().y + (to.getBoundingClientRect().height /2) - off_set_y;

    el.style.height = Math.max(arrow.y1.baseVal.value , arrow.y2.baseVal.value)+2+"px";

    
}

function update_line() {
    const to_remove = document.querySelectorAll("svg.rail");
    to_remove.forEach(rail => {
      //rail.remove(); 
      update_connection(rail);
    });

}

function switch_actif(el) {
    if(el.target.classList.contains("actif")){
        el.target.classList.remove("actif");
    }else{
        el.target.classList.add("actif");
    }
}





// end 






async function change_hub() {
    load_platform(in_station_name.value, in_hub.value)
    .then(finish => {
        build_all_connection();
    });
}


async function load() {
    in_hub.innerHTML = '';
    in_hub.classList.add("loading")
    load_hub_op(in_station_name.value)
    .then(finish => {
        return load_platform(in_station_name.value, in_hub.value);
    })
    .then(finish => {
        build_all_connection();
    });
}

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
    return true;
}

// in_station_name.value, in_hub.value
async function load_platform(station_id,hub) {

    const rep = await fetch(
        'index.php?page=platform_manager&station_name=' + station_id
        +'&hub_id='+hub
    );

    let data = await rep.json();

    plat_list.innerHTML ="";
    console.log(data['platforms'].length)
    start_pod.style.top = data['platforms'].length * 50 + "px"
    end_pod.style.top = data['platforms'].length * 50 + "px"

    for (var i = 0; i < data['platforms'].length; i++) {
        let tmp_option = temp_plat.content.cloneNode(true);
        tmp_option.querySelector("#letter").innerHTML = data['platforms'][i]['PLATFORM_LETTER'];
        tmp_option.querySelector(".train_number").innerHTML = data['platforms'][i]['PLATFORM_USER'];

        if (data['platforms'][i]['PLATFORM_UTILISATION'] == 0){
            tmp_option.querySelector(".quai").classList.add("free");
            tmp_option.querySelector(".logo_train").classList.add("no_train");
        }else{  
            tmp_option.querySelector(".logo_train").classList.remove("no_train");
            tmp_option.querySelector(".logo_train").classList.add("visible_train");
        }

        if (data['platforms'][i]['PLATFORM_STATUS'] == 1){
            tmp_option.querySelector(".btn_actif").classList.add("actif");

            tmp_option.querySelector(".quai").classList.remove("block");
        }

        plat_list.appendChild(tmp_option);
    }

    console.log("plat adding finish")
    return true

    
}



// in_station_name.value, in_hub.value
async function update_platform() {
    console.log("update")
    let station_id = in_station_name.value;
    let hub = in_hub.value;

    while (in_hub.value == ""){
        await new Promise(r => setTimeout(r, 500));      
    }
    hub = in_hub.value;


    const rep = await fetch(
        'index.php?page=platform_manager&station_name=' + station_id
        +'&hub_id='+hub
    );

    let data = await rep.json();
    let platforms = document.querySelectorAll(".quai");

    
    while (platforms.length != data['platforms'].length){
        console.log("bug not same size",platforms.length , data['platforms'].length)
        await new Promise(r => setTimeout(r, 500));      
        
    }

    for (var i = 0; i < data['platforms'].length; i++) {
        let platform = platforms[i];
        platform.querySelector(".train_number").innerHTML = data['platforms'][i]['PLATFORM_USER'];
        if (data['platforms'][i]['PLATFORM_UTILISATION'] == 0){
            platform.classList.add("free");
            platform.querySelector(".logo_train").classList.add("no_train");
            //platform.querySelector(".logo_train").classList.remove("visible_train");
        }else{  
            platform.classList.remove("free");
            platform.querySelector(".logo_train").classList.remove("no_train");
            platform.querySelector(".logo_train").classList.add("visible_train");
        }

        if (data['platforms'][i]['PLATFORM_STATUS'] == 1){
            platform.querySelector(".btn_actif").classList.add("actif");
            platform.classList.remove("block");
        }else{
            platform.querySelector(".btn_actif").classList.remove("actif");
            platform.classList.add("block");
        }

    }

    setTimeout(update_platform,500);
    return true

    
}


load()

update_platform()
