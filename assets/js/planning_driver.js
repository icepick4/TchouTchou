const date = new Date();
import { getFlags } from "./functions.js";

const script = document.querySelector('script[src*="planning_driver.js"]');
let flag = script.outerHTML;

function initModal() {
  document.querySelectorAll(".travel").forEach((travel) => {
    travel.addEventListener("click", (e) => {
      let id = e.target.getAttribute("value");
      openModal(id);
    });
  });

  let modal = document.getElementById("infoModal");
  let overlay = document.getElementById("overlay");

  function openModal(id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        modal.children[1].innerHTML = this.responseText;
        modal.classList.add("active");
        overlay.classList.add("active");
      }
    };
    xmlhttp.open("GET", "index.php?api=planning_info&id=" + id, true);
    xmlhttp.send();
  }

  document.querySelectorAll(".close").forEach((close) => {
    close.addEventListener("click", (e) => {
      closeModal();
    });
  });

  function closeModal() {
    modal.classList.remove("active");
    overlay.classList.remove("active");
  }
}

function openCalendar(day) {
  let link =
    "index.php?api=planning&day=" + day + "&driverID=" + getFlags(flag)[0];
  console.log(link);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector("#planning").innerHTML = this.responseText;
      setTimeout(() => {
        initModal();
      }, 200);
    }
  };

  xmlhttp.open("GET", link, true);
}

document.onload = openCalendar(date.getDate());

let button = document.querySelector("#test");
button.addEventListener("click", function () {
  openCalendar(date.getDate());
});
