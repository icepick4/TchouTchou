const start_pod = document.querySelector("div.start");
const end_pod = document.querySelector("div.finish");
const temp_connection = document.querySelector("template#connection");
const aiguillage = document.querySelector("div.aiguillage")
const actif = document.querySelectorAll("button.btn_actif");
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

	arrow = start.querySelector("line")
	arrow.x1.baseVal.value = start_pod.getBoundingClientRect().x + start_pod.getBoundingClientRect().width;
	arrow.y1.baseVal.value = start_pod.getBoundingClientRect().y + (start_pod.getBoundingClientRect().height /2);

	arrow.x2.baseVal.value = cible.getBoundingClientRect().x ;
	arrow.y2.baseVal.value = cible.getBoundingClientRect().y + (cible.getBoundingClientRect().height /2);

	arrow2 = end.querySelector("line")
	arrow2.x1.baseVal.value = cible.getBoundingClientRect().x + cible.getBoundingClientRect().width ;
	arrow2.y1.baseVal.value = cible.getBoundingClientRect().y + (cible.getBoundingClientRect().height /2);

	arrow2.x2.baseVal.value = end_pod.getBoundingClientRect().x ;
	arrow2.y2.baseVal.value = end_pod.getBoundingClientRect().y + (end_pod.getBoundingClientRect().height /2);


	start.querySelector("svg")._start = start_pod;
	start.querySelector("svg")._to = cible;
	start.querySelector("svg").style.height = Math.max(arrow.y1.baseVal.value , arrow.y2.baseVal.value)+2+"px";
	
	end.querySelector("svg")._start = cible;
	end.querySelector("svg")._to = end_pod;
	end.querySelector("svg").style.height = Math.max(arrow2.y1.baseVal.value , arrow2.y2.baseVal.value)+2+"px";
	aiguillage.appendChild(start);
	aiguillage.appendChild(end);


}


function update_connection(el) {
	const from = el._start;
	const to = el._to;

	arrow = el.querySelector("line")
	arrow.x1.baseVal.value = from.getBoundingClientRect().x + from.getBoundingClientRect().width ;
	arrow.y1.baseVal.value = from.getBoundingClientRect().y + (from.getBoundingClientRect().height /2);

	arrow.x2.baseVal.value = to.getBoundingClientRect().x ;
	arrow.y2.baseVal.value = to.getBoundingClientRect().y + (to.getBoundingClientRect().height /2);

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


build_all_connection()

addEventListener('resize', (event) => {update_line()});//;build_all_connection();});
