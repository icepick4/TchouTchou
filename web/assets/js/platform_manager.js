const in_station_name = document.querySelector("select#station_name");
const in_hub = document.querySelector("select#hub_id");
const plat_list = document.querySelector(".list_quai");
const conec_list = document.querySelector(".suport_rail");
const incoming_list = document.querySelector("div#approching_list");
const incoming_temp = document.querySelector("template#approching_train");
let last_update = "";
let last_update_incoming_train = "";
let last_update_available_platform = "";
let req;
const temp_plat = document.querySelector("template#platforms");

// lang

const LANG_OPEN = document
  .querySelector(".lang")
  .querySelector("#OPEN").innerHTML;
const LANG_CLOSE = document
  .querySelector(".lang")
  .querySelector("#CLOSE").innerHTML;
const LANG_CONFIRM = document
  .querySelector(".lang")
  .querySelector("#CONFIRM").innerHTML;

// platform connection

const start_pod = document.querySelector("div.start");
const end_pod = document.querySelector("div.finish");
const temp_connection = document.querySelector("template#connection");
const aiguillage = document.querySelector(".suport_rail #connection-liste");
const actif = document.querySelectorAll("button.btn_actif");
const ref = document.querySelector("div#reference");
const off_set = 17;

in_station_name.addEventListener("change", function (event) {
  sessionStorage.setItem("station", in_station_name.value);
  load();
});

in_hub.addEventListener("change", function (event) {
  sessionStorage.setItem("hub", in_hub.value);
  change_hub();
});

addEventListener("resize", (event) => {
  update_line();
});

const sleep = (ms) => new Promise((r) => setTimeout(r, ms));

function startLoadingAnim(step = 1) {
  if (step == 1) {
    in_hub.classList.add("loading");
    plat_list.classList.add("loading");
    conec_list.classList.add("loading");
  } else {
    plat_list.classList.add("loading");
    conec_list.classList.add("loading");
  }
}

function stopLoadinAnim(step = 2) {
  if (step == 1) {
    in_hub.classList.remove("loading");
  } else {
    in_hub.classList.remove("loading");
    plat_list.classList.remove("loading");
    conec_list.classList.remove("loading");
  }
}

function build_all_connection() {
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
  arrow.x1.baseVal.value =
    from.getBoundingClientRect().x +
    from.getBoundingClientRect().width -
    off_set;
  arrow.y1.baseVal.value =
    from.getBoundingClientRect().y +
    from.getBoundingClientRect().height / 2 -
    off_set_y;

  arrow.x2.baseVal.value = to.getBoundingClientRect().x - off_set;
  arrow.y2.baseVal.value =
    to.getBoundingClientRect().y +
    to.getBoundingClientRect().height / 2 -
    off_set_y;

  el.style.height =
    Math.max(arrow.y1.baseVal.value, arrow.y2.baseVal.value) + 2 + "px";
}

function update_line() {
  const to_remove = document.querySelectorAll("svg.rail");
  to_remove.forEach((rail) => {
    //rail.remove();
    update_connection(rail);
  });
}

async function checkWarned(el) {
  console.log("warned updated");
  if (el.warned == true) {
    el.classList.remove("warned");
    el.warned = false;
    if (el.actif == true) {
      el.querySelector("p").innerHTML = "ouvert";
    } else {
      el.querySelector("p").innerHTML = "fermé";
    }
  }
}

async function switch_actif(el) {
  if (
    this.actif == true &&
    !this.parentNode.parentNode.classList.contains("free")
  ) {
    return;
  }
  if (this.warned == false) {
    this.querySelector("p").innerHTML = LANG_CONFIRM;
    this.warned = true;
    this.classList.add("warned");
    setTimeout(checkWarned.bind(null, this), 2000);
    return;
  }
  let newStatus = 0;
  if (this.actif == true) {
    this.classList.remove("actif");
    this.classList.remove("warned");
    this.querySelector("p").innerHTML = LANG_CLOSE;
    newStatus = 0;
  } else {
    this.classList.remove("warned");
    this.classList.add("actif");
    this.querySelector("p").innerHTML = LANG_OPEN;
    newStatus = 1;
  }

  const rep = await fetch(
    "index.php?api=set_platform_status&station_id=" +
      in_station_name.value +
      "&hub_id=" +
      in_hub.value +
      "&plat_letter=" +
      this.letter +
      "&plat_status=" +
      newStatus
  );
  let data = await rep.text();
  this.warned = false;
}

async function change_hub() {
  load_platform(in_station_name.value, in_hub.value).then((finish) => {
    build_all_connection();
  });
}

async function load() {
  in_hub.innerHTML = "";
  
  startLoadingAnim(1);
  load_hub_op(in_station_name.value)
    .then((finish) => {
      stopLoadinAnim(1);
      return load_platform(in_station_name.value, in_hub.value);
    })
    .then((finish) => {
      build_all_connection();
    })
    .then((finish) => {
      stopLoadinAnim(2);
    });
    //showIncoming();
}

async function load_hub_op(id) {

  const rep = await fetch("index.php?api=get_hub&station_id=" + id);

  let data = await rep.json();

  in_hub.innerHTML = "";
  for (var i = 0; i < data["hub"].length; i++) {
    let tmp_option = document.createElement("option");
    tmp_option.innerHTML = data["hub"][i];
    in_hub.appendChild(tmp_option);
  }
  in_hub.classList.remove("loading");
  plat_list.classList.remove("loading");
  conec_list.classList.remove("loading");

  // load last value
  setIfDefined(sessionStorage.getItem("hub"), in_hub);

  return true;
}

// in_station_name.value, in_hub.value
async function load_platform(station_id, hub) {
  console.log("[api] load_platform");
  const rep = await fetch(
    "index.php?api=get_platform&station_id=" +
      station_id +
      "&hub_id=" +
      hub
  );

  let data = await rep.json();

  plat_list.innerHTML = "";

  start_pod.style.top = data["platforms"].length * 50 + "px";
  end_pod.style.top = data["platforms"].length * 50 + "px";

  for (var i = 0; i < data["platforms"].length; i++) {
    let tmp_option = temp_plat.content.cloneNode(true);
    tmp_option.querySelector("#letter").innerHTML =
      data["platforms"][i]["PLATFORM_LETTER"];

    setPlatformValues(
      tmp_option.querySelector("div.quai"),
      data["platforms"][i]
    );

    tmp_option.querySelector(".btn_actif").warned = false;
    tmp_option
      .querySelector(".btn_actif")
      .addEventListener("click", switch_actif);
    tmp_option.querySelector(".btn_actif").letter =
      data["platforms"][i]["PLATFORM_LETTER"];

    plat_list.appendChild(tmp_option);
  }

  return true;
}

// in_station_name.value, in_hub.value
async function update_platform() {
  let station_id = in_station_name.value;
  let hub = in_hub.value;

  while (in_hub.value == "") {
    await new Promise((r) => setTimeout(r, 500));
  }
  hub = in_hub.value;


  const rep = await fetch(
    "index.php?api=get_platform&station_id=" +
      station_id +
      "&hub_id=" +
      hub
  );

  let data = await rep.json();
  let platforms = document.querySelectorAll(".quai");

  while (platforms.length != data["platforms"].length) {
    console.log(
      "bug not same size",
      platforms.length,
      data["platforms"].length
    );
    load();
    await new Promise((r) => setTimeout(r, 500));
  }

  if (last_update != JSON.stringify(data["platforms"])) {
    console.log("update");
    for (var i = 0; i < data["platforms"].length; i++) {
      let platform = platforms[i];
      setPlatformValues(platform, data["platforms"][i]);
    }
    last_update = JSON.stringify(data["platforms"]);
  }

  return true;
}

function setPlatformValues(platform, value) {
  platform.querySelector(".train_number").innerHTML = value["PLATFORM_USER"];
  if (value["PLATFORM_UTILISATION"] == 0) {
    platform.classList.add("free");
    platform.querySelector(".logo_train").classList.add("no_train");
  } else {
    platform.classList.remove("free");
    platform.querySelector(".logo_train").classList.remove("no_train");
    platform.querySelector(".logo_train").classList.add("visible_train");
  }

  if (value["PLATFORM_STATUS"] == 1) {
    platform.querySelector(".btn_actif").classList.add("actif");
    platform.querySelector(".btn_actif").actif = true;
    platform.classList.remove("block");
    platform.querySelector(".btn_actif").querySelector("p").innerHTML =
      LANG_OPEN;
  } else {
    platform.querySelector(".btn_actif").classList.remove("actif");
    platform.querySelector(".btn_actif").actif = false;
    platform.querySelector(".btn_actif").querySelector("p").innerHTML =
      LANG_CLOSE;
    platform.classList.add("block");
  }
}

async function getIncoming(station_id) {

  const rep = await fetch(
    "index.php?api=get_incoming_train&station_id=" + station_id + "&incoming="
  );
  let data = await rep.json();
  return data;
}

async function showIncoming(data) {
  

    last_update_incoming_train = await JSON.stringify(data["incoming"]);

    incoming_list.innerHTML = "";
    for (var i = 0; i < data["incoming"].length; i++) {
      let incoming = incoming_temp.content
        .cloneNode(true)
        .querySelector("div.approching_train");
      incoming.querySelector("p.train_nb").innerHTML = data["incoming"][i]["TRAIN_ID"];
      incoming.querySelector("p.train_origin").innerHTML = data["incoming"][i]["ORIGIN"];
      incoming.querySelector("select").train_id = data["incoming"][i]["TRAIN_ID"];
      if (data["incoming"][i]["PLATFORM"] != null) {
        //console.log("add option");
        let tmp_option = document.createElement("option");
        tmp_option.setAttribute("selected", true);
        tmp_option.innerHTML = data["incoming"][i]["PLATFORM"];
        incoming.querySelector("select").appendChild(tmp_option);
        
      }

      incoming.querySelector("select").addEventListener("change",changePlatformUser);
      incoming.querySelector("select").disabled = false;
      incoming_list.appendChild(incoming);
    }

   
  
 
}

async function getAvailablePlatform(station_id, hub_id) {

  const rep = await fetch(
    "index.php?api=get_available_platform&station_id=" +
      station_id +
      "&hub_id=" +
      hub_id +
      "&incoming="
  );
  return await rep.json();
}

async function setAvailablePlatform(availablePlatform) {
  const incoming_list_select = incoming_list.querySelectorAll("select");


    last_update_available_platform =
      await JSON.stringify(availablePlatform) + incoming_list_select.length;

    for (var i = 0; i < incoming_list_select.length; i++) {

      if (incoming_list_select[i].value !=  "None"){
        incoming_list_select[i].options.length = 2;
      }else{
        incoming_list_select[i].options.length = 1;
      }

      availablePlatform.forEach((letter) => {
        let tmp_option = document.createElement("option");
        tmp_option.innerHTML = letter;
        tmp_option.value = letter;
        incoming_list_select[i].appendChild(tmp_option);
      });
    }

  
}

async function updateIncomingTrain() {
  const incoming = await getIncoming(in_station_name.value);
  const incoming_list_select = incoming_list.querySelectorAll("select");
  let availablePlatform = await getAvailablePlatform(
    in_station_name.value, in_hub.value);
  availablePlatform = availablePlatform["available_platform"];

  if (last_update_incoming_train != JSON.stringify(incoming["incoming"])){
    await showIncoming(incoming);

    await setAvailablePlatform(availablePlatform);
    console.log("update incoming both")
  }else if (last_update_available_platform !=
    JSON.stringify(availablePlatform) + incoming_list_select.length
    ){
    await setAvailablePlatform(availablePlatform);
    console.log("update incoming")
  }
}

function changePlatformUser(evt) {
  console.log("change",evt.target.value, evt.target.train_id);
  setPlatformUser(in_station_name.value,
    in_hub.value,evt.target.value,evt.target.train_id );
  evt.target.disabled = true;
}

async function setPlatformUser(station_id, hub_id, letter, train_id){

  const setPlatformUser_res = await fetch(
    "index.php?api=set_platform_user&station_id=" +
      station_id +
      "&hub_id=" +
      hub_id +
      "&train_id=" + 
      train_id + 
      "&platform_letter=" + 
      letter 
  );

}

function setIfDefined(value, input) {
  if (!value == "") {
    input.value = value;
  }
}

async function autoUpdate() {
  while (true) {
    try {
      await update_platform();
      await updateIncomingTrain();
    } catch (e) {
      console.log("auto update", e);
    }

    const p = await sleep(500);
  }
}

setIfDefined(sessionStorage.getItem("station"), in_station_name);

load();

update_platform();

autoUpdate();


