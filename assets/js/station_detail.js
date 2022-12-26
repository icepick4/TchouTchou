let departures = document.querySelector("#departures");
let arrivals = document.querySelector("#arrivals");

arrivals.remove();

let switchButton = document.querySelector(".switch");

switchButton.addEventListener("click", toggle);

function toggle() {
  if (switchButton.children[0].checked) {
    departures.remove();
    document.querySelector("#main").append(arrivals);
  } else {
    arrivals.remove();
    document.querySelector("#main").append(departures);
  }
}
