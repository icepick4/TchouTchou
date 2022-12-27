function userPosition(position) {
  var infopos = "";
  //Lattitude
  infopos +=  position.coords.latitude + "//";
  //Longitude
  infopos += position.coords.longitude ;
  document.getElementById("infoPosition").value = infopos;
}
function getUserPosition() {
  if (navigator.geolocation)
    navigator.geolocation.getCurrentPosition(userPosition);
}

positionButton.addEventListener("click", getUserPosition);

let alertEvent = document.querySelectorAll("#alertContainer a");
const form = document.querySelector("form");
form.addEventListener("submit", formVerify);
let info = document.querySelector("#info");

alertEvent.forEach((element) => {
  element.addEventListener("click", function () {
    if (element.classList.contains("active")) {
      document.querySelector("#alertType").value = "";
      enableAlert();
    } else {
      let alertId = element.children[0].getAttribute("data-id");
      document.querySelector("#alertType").value = alertId;
      disableAlert(alertId);
    }
    element.classList.toggle("active");
  });
});

function enableAlert() {
  alertEvent.forEach((element) => {
    element.classList.remove("disabled");
  });
}

function disableAlert(id) {
  alertEvent.forEach((element) => {
    if (element.children[0].getAttribute("data-id") != id) {
      element.classList.add("disabled");
    }
  });
}

function formVerify(evt) {
  let verif = document.querySelector("#alertType").value;
  if (verif == "") {
    evt.preventDefault();
    info.style.display = "block";
    window.scrollTo(0, 0);
  }
}
