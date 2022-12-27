function userPosition(position) {
  var infopos = "Position déterminée :\n";
  infopos += "Latitude : " + position.coords.latitude + "\n";
  infopos += "Longitude: " + position.coords.longitude + "\n";
  document.getElementById("infoPosition").value = infopos;
}
function getUserPosition() {
  if (navigator.geolocation)
    navigator.geolocation.getCurrentPosition(userPosition);
}

positionButton.addEventListener("click", getUserPosition);

let alertEvent = document.querySelectorAll("#alertContainer a");

alertEvent.forEach((element) => {
  element.addEventListener("click", function () {
    if (element.children[0].classList.contains("active")) {
      document.querySelector("#alertType").value = "";
      enableAlert();
    } else {
      let alertId = element.children[0].getAttribute("data-id");
      document.querySelector("#alertType").value = alertId;
      disableAlert(alertId);
    }
    element.children[0].classList.toggle("active");
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
