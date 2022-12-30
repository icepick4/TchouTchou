let buttonToDesactive = document.getElementById("finishButton");
let url = window.location.href;
buttonToDesactive.addEventListener("click", function () {
  var xhttp = new XMLHttpRequest();
  xhttp.open(
    "GET",
    "views/endAlert.php?id=" + url.slice(url.indexOf("=") + 1),
    true
  );
  xhttp.send();
  xhttp.onload = function () {};
  xhttp.onerror = function () {};
});
