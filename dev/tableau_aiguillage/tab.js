const start_pod = document.querySelector("div.start");
const end_pod = document.querySelector("div.finish");
const temp_connection = document.querySelector("template#connection");
const aiguillage = document.querySelector("div.aiguillage")

/*
const arrow = document.querySelector("line");
arrow.x1.baseVal.value = 0;
arrow.y1.baseVal.value = 300;
arrow.x2.baseVal.value = 100;
arrow.y2.baseVal.value = 300;

arrow.x1.baseVal.value = start_pod.getBoundingClientRect().x + start_pod.getBoundingClientRect().width;
arrow.y1.baseVal.value = start_pod.getBoundingClientRect().y + (start_pod.getBoundingClientRect().height /2);

arrow.x2.baseVal.value = end_pod.getBoundingClientRect().x ;
arrow.y2.baseVal.value = end_pod.getBoundingClientRect().y + (end_pod.getBoundingClientRect().height /2);
console.log(arrow.attributes)
console.log(start_pod.getBoundingClientRect())
console.log(end_pod.getBoundingClientRect())
console.log(end_pod.getBoundingClientRect().height /2 ,end_pod.getBoundingClientRect().y)



addEventListener('resize', (event) => {});
*/
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

	arrow = end.querySelector("line")
	arrow.x1.baseVal.value = cible.getBoundingClientRect().x + cible.getBoundingClientRect().width ;
	arrow.y1.baseVal.value = cible.getBoundingClientRect().y + (cible.getBoundingClientRect().height /2);

	arrow.x2.baseVal.value = end_pod.getBoundingClientRect().x ;
	arrow.y2.baseVal.value = end_pod.getBoundingClientRect().y + (end_pod.getBoundingClientRect().height /2);


	aiguillage.appendChild(start);
	aiguillage.appendChild(end);


}




function clear_line() {
	const to_remove = document.querySelectorAll("svg.rail");
	to_remove.forEach(rail => {
	  rail.remove(); });

}


build_all_connection()

addEventListener('resize', (event) => {clear_line();build_all_connection();});