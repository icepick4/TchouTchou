const in_station_name = document.querySelector('select#station_name');
const in_hub = document.querySelector('select#hub_id');
const tmp_plat_list = document.querySelector('.tmp_list_platform')
const temp_plat = document.querySelector('template.template');
let req;

// imported js

const start_pod = document.querySelector("div.start");
const end_pod = document.querySelector("div.finish");
const temp_connection = document.querySelector("template#connection");
const aiguillage = document.querySelector("div.aiguillage div.suport_rail")
const actif = document.querySelectorAll("button.btn_actif");
const ref = document.querySelector("div#reference");
let off_set_y = ref.getBoundingClientRect().y;
const off_set = 10;



function build_all_connection(){
    const quais = document.querySelectorAll(".quai");
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
    let arrow = el.querySelector("line");
    arrow.x1.baseVal.value = from.getBoundingClientRect().x + from.getBoundingClientRect().width - off_set ;
    arrow.y1.baseVal.value = from.getBoundingClientRect().y + (from.getBoundingClientRect().height /2) - off_set_y;

    arrow.x2.baseVal.value = to.getBoundingClientRect().x - off_set;
    arrow.y2.baseVal.value = to.getBoundingClientRect().y + (to.getBoundingClientRect().height /2) - off_set_y;

    el.style.height = Math.max(arrow.y1.baseVal.value , arrow.y2.baseVal.value)+2+"px";

    
}

function update_line() {
    const to_remove = document.querySelectorAll("svg.rail");
    off_set_y = ref.getBoundingClientRect().y;
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


build_all_connection()

addEventListener('resize', (event) => {update_line()});//;build_all_connection();});

// end 


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

