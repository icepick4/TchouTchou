import { getFlags } from "./functions.js";

var message = document.getElementsByClassName("discussion_resume");

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
}
