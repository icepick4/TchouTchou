let buttonToDesactive = document.getElementById("finishButton");
let url = window.location.href;
buttonToDesactive.addEventListener("click", function () {
  var xhttp = new XMLHttpRequest();
  xhttp.open(
    "GET",
    "ajax/endAlert.php?id=" + url.slice(url.indexOf("=") + 1),
    true
  );
  xhttp.send();
  xhttp.onload = function () {
    if (this.status == 200) {
      window.location.href = "?page=alert_list";
    }
  };
  xhttp.onerror = function () {
    window.location.href =
      "?page=alert_single&id=" + url.slice(url.indexOf("=") + 1);
  };
});
