import { getFlags } from "./functions.js";

var message = document.getElementsByClassName("discussion_resume");
var currentMessage = -1;
var discussion = document.querySelector("#messages");

const script = document.querySelector('script[src*="messages.js"]');
let flag = script.outerHTML;

//event listener for each discussion_resume
for (let i = 0; i < message.length; i++) {
  message[i].addEventListener("click", getMessageIdOnclick);
}

function getMessageIdOnclick(e) {
  var number, test;
  if (e.target.nodeName == "H3" || e.target.nodeName == "P") {
    number = e.target.parentNode.children[0].innerText;
    test = 0;
  } else {
    number = e.target.children[0].innerText;
    test = 1;
  }
  loadMessage(number);
  setTimeout(function () {
    let discussion_id = document.querySelector("#discussion_id").value;
    if (test == 0) {
      e.target.parentNode.children[0].innerText = discussion_id;
    } else {
      e.target.children[0].innerText = discussion_id;
    }
    localStorage.setItem("currentMessage", number);
    currentMessage = number;
  }, 500);
}

function loadMessage(id) {
  currentMessage = id;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("messages").innerHTML = this.responseText;
    }
  };
  xmlhttp.open(
    "GET",
    "views/messageRequest.php?number=" + id + "&id=" + getFlags(flag)[0],
    true
  );
  xmlhttp.send();
  //wait 1s to scroll to the bottom of the discussion
  setTimeout(function () {
    discussion.scrollTop = discussion.scrollHeight;
  }, 200);
}

//call loadMessage() every 30 seconds to refresh the message
setInterval(function () {
  if (currentMessage != -1) {
    loadMessage(currentMessage);
  }
}, 30000);

// on load, load the last message
window.onload = function () {
  if (localStorage.getItem("currentMessage") != null) {
    loadMessage(localStorage.getItem("currentMessage"));
  }
};

let input = document.getElementById("search");
if (input != null) {
  var users = document.querySelector("#users").innerText.split("//");

  input.addEventListener("keyup", recherche);

  function recherche() {
    let inputValue = input.value.toLowerCase();
    let x = document.getElementsByClassName("discussion_resume");
    for (let i = 0; i < x.length; i++) {
      if (!x[i].innerHTML.toLowerCase().includes(inputValue)) {
        x[i].style.display = "none";
      } else {
        x[i].style.display = "block";
      }
    }
  }

  function searchWithAutocomplete(input, arr) {
    input.addEventListener("keyup", function (event) {
      var a, b, i;
      var val = event.target.value;
      closeAllLists();
      if (!val) {
        return false;
      }
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      this.parentNode.appendChild(a);
      for (i = 0; i < arr.length; i++) {
        if (arr[i].toUpperCase().includes(val.toUpperCase())) {
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          b.addEventListener("click", function (e) {
            input.value = this.getElementsByTagName("input")[0].value;
            closeAllLists();
            recherche();
          });
          a.appendChild(b);
        }
      }
    });

    function closeAllLists(elmnt) {
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != input) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }

    document.addEventListener("click", function (e) {
      closeAllLists(e.target);
    });

    let cross = document.getElementById("clear-search");
    cross.addEventListener("click", function () {
      input.value = "";
      recherche();
    });
  }

  searchWithAutocomplete(input, users);
}

let chat = document.getElementById("chat");
let resume = document.getElementById("resume");
let resumeClient = document.getElementById("resumeClient");
let resumeSupport = document.getElementById("resumeSupport");

let chatSwitch = document.querySelector(".switch");
let inputSwitch = document.querySelector(".switch input");

let storageButton = document.getElementById("storage");
storageButton.addEventListener("click", toggleStorage);
let storage = false;

resumeClient.remove();
storageButton.style.display = "none";

chatSwitch.addEventListener("click", function () {
  if (inputSwitch.checked) {
    resumeSupport.remove();
    resume.append(resumeClient);
    storageButton.style.display = "block";
    storageButton.click();
    storageButton.click();
  } else {
    resumeClient.remove();
    resume.append(resumeSupport);
    storageButton.style.display = "none";
  }
});

function toggleStorage() {
  if (storage) {
    storage = false;
    storageButton.classList.remove("active");
    addStorage();
  } else {
    storage = true;
    storageButton.classList.add("active");
    removeStorage();
  }
}

function removeStorage() {
  for (let i = 0; i < message.length; i++) {
    if (message[i].classList.contains("0")) {
      message[i].style.display = "block";
    } else {
      message[i].style.display = "none";
    }
  }
}

function addStorage() {
  for (let i = 0; i < message.length; i++) {
    if (message[i].classList.contains("0")) {
      message[i].style.display = "none";
    } else {
      message[i].style.display = "block";
    }
  }
}
