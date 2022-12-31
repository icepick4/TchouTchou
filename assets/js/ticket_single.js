import { getFlags } from "./functions.js";
const script = document.querySelector('script[src*="ticket_single.js"]');
let flag = script.outerHTML;
let cancelButton = document.getElementById("cancel-button");
let modifyButton = document.getElementById("modify-button");
let url = window.location.href;

cancelButton.addEventListener("click", function () {
  console.log(url.slice(url.indexOf("&ticket=") + 8));
  var xhttp = new XMLHttpRequest();
  xhttp.open(
    "GET",
    "views/deleteTicket.php?ticket=" +
      url.slice(url.indexOf("&ticket=") + 8) +
      "&id=" +
      getFlags(flag)[0],
    true
  );
  xhttp.send();
  xhttp.onload = function () {
    if (this.status == 200) {
      window.location.href = "?page=ticket_list";
    }
  };
  xhttp.onerror = function () {
    window.location.href =
      "?page=ticket_single&ticket=" + url.slice(url.indexOf("&ticket=") + 8);
  };
});

modifyButton.addEventListener("click", function () {});
