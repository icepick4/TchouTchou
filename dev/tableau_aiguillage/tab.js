const start_pod = document.querySelector("div.start");
const end_pod = document.querySelector("div.finish");
const temp_connection = document.querySelector("template#connection");
const aiguillage = document.querySelector("div.aiguillage div.suport_rail")
const actif = document.querySelectorAll("button.btn_actif");
const ref = document.querySelector("div#reference");
let off_set_y = ref.getBoundingClientRect().y;
const off_set = 1;

actif.forEach(btn => {
	btn.addEventListener('click', (event) => {switch_actif(event)});
});

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
	
	arrow = el.querySelector("line")
	arrow.x1.baseVal.value = from.getBoundingClientRect().x + from.getBoundingClientRect().width - off_set ;
	arrow.y1.baseVal.value = from.getBoundingClientRect().y + (from.getBoundingClientRect().height /2) - off_set_y;

	arrow.x2.baseVal.value = to.getBoundingClientRect().x + off_set;
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
