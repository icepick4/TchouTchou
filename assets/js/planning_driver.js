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
  console.log("test");
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.open(
    "GET",
    "index.php?api=planning_driver&day=" +
      day +
      "&driverID=" +
      getFlags(flag)[0],
    true
  );
  xmlhttp2.send();
  xmlhttp2.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector("#planning").innerHTML = this.responseText;
      initModal();
      let title = document.querySelector("th").innerText;
      currentDate = parseInt(title.innerText.substring(0, title.indexOf("-")));
    }
  };
}

var currentDate;
document.onload = openCalendar(date.getDate());
setTimeout(function () {
  currentDate = parseInt(
    document.querySelector("th").innerText.substring(0, 2)
  );
  let nextButton = document.querySelector("#nextButton");
  nextButton.addEventListener("click", function () {
    openCalendar(currentDate + 1);
  });
  let previousButton = document.querySelector("#previousButton");
  previousButton.addEventListener("click", function () {
    openCalendar(currentDate - 1);
  });
}, 1000);
