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

function openCalendar(day, month, year) {
  let request = "index.php?api=planning_driver&date=" + day;
  if (month < 10) {
    request += "/0" + month;
  } else {
    request += "/" + month;
  }
  request += "/" + year + "&driverID=" + getFlags(flag)[0];
  var xmlhttp2 = new XMLHttpRequest();
  xmlhttp2.open("GET", request, true);

  xmlhttp2.send();
  xmlhttp2.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector("#planning").innerHTML = this.responseText;
      initModal();
      let title = document.querySelector("th").innerText;
      currentDate = title.split("/");
      for (let i = 0; i < currentDate.length; i++) {
        currentDate[i] = parseInt(currentDate[i]);
      }
      let nextButton = document.querySelector("#nextButton");
      nextButton.addEventListener("click", function () {
        if (currentDate[1] in [1, 3, 5, 7, 8, 10, 12]) {
          if (currentDate[0] == 31) {
            currentDate[0] = 1;
          } else {
            currentDate[0]++;
          }
        } else if (currentDate[1] in [4, 6, 9, 11]) {
          if (currentDate[0] == 30) {
            currentDate[0] = 1;
          } else {
            currentDate[0]++;
          }
        } else if (currentDate[1] == 2) {
          if (
            (currentDate[2] % 4 == 0 && currentDate[2] % 100 != 0) ||
            currentDate[2] % 400 == 0
          ) {
            if (currentDate[0] == 29) {
              currentDate[0] = 1;
            } else {
              currentDate[0]++;
            }
          } else {
            if (currentDate[0] == 28) {
              currentDate[0] = 1;
            } else {
              currentDate[0]++;
            }
          }
        }
        openCalendar(currentDate[0], currentDate[1], currentDate[2]);
      });
      let previousButton = document.querySelector("#previousButton");
      previousButton.addEventListener("click", function () {
        if (currentDate[1] in [1, 3, 5, 7, 8, 10, 12]) {
          if (currentDate[0] == 1) {
            currentDate[0] = 31;
          } else {
            currentDate[0]--;
          }
        } else if (currentDate[1] in [4, 6, 9, 11]) {
          if (currentDate[0] == 1) {
            currentDate[0] = 30;
          } else {
            currentDate[0]--;
          }
        } else if (currentDate[1] == 2) {
          if (
            (currentDate[2] % 4 == 0 && currentDate[2] % 100 != 0) ||
            currentDate[2] % 400 == 0
          ) {
            if (currentDate[0] == 1) {
              currentDate[0] = 29;
            } else {
              currentDate[0]--;
            }
          } else {
            if (currentDate[0] == 1) {
              currentDate[0] = 28;
            } else {
              currentDate[0]--;
            }
          }
        }
        openCalendar(currentDate[0], currentDate[1], currentDate[2]);
      });
    }
  };
}

var currentDate;
document.onload = openCalendar(
  date.getDate(),
  date.getMonth() + 1,
  date.getFullYear()
);
