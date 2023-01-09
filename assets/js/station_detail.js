let departures = document.querySelector("#departures");
let arrivals = document.querySelector("#arrivals");

arrivals.remove();

let switchButton = document.querySelector(".switch");
let info = 0;

switchButton.addEventListener("click", toggle);

function toggle() {
  if (switchButton.children[0].checked) {
    info = 1;
    departures.remove();
    document.querySelector("#main").append(arrivals);
  } else {
    info = 0;
    arrivals.remove();
    document.querySelector("#main").append(departures);
  }
}

let fullScreenButton = document.querySelector("#fullScreenButton");

fullScreenButton.addEventListener("click", toggleFullScreen);

function toggleFullScreen() {
  let element;
  let header = document.createElement("h2");
  if (info == 0) {
    element = departures;
    header.innerHTML = switchButton.children[2].innerText;
  } else {
    element = arrivals;
    header.innerHTML = switchButton.children[3].innerHTML;
  }
  element.prepend(header);
  element.requestFullscreen();

  
  element.addEventListener("fullscreenchange", function () {
    if (!document.fullscreenElement) {
      header.remove();
    }
  });
}
