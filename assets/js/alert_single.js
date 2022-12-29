let buttonToDesactive = document.getElementById("finishButton");

buttonToDesactive.addEventListener("click", function () {
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "views/endAlert.php", true);
  xhttp.send();
});
