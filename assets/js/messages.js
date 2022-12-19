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
  if (e.target.nodeName == "H3" || e.target.nodeName == "P") {
    var number = e.target.parentNode.children[0].innerText;
  } else {
    var number = e.target.children[0].innerText;
  }
  currentMessage = number;
  localStorage.setItem("currentMessage", number);
  loadMessage(number);
}

function loadMessage(id) {
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
