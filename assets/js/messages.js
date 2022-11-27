let discussionsResume = document.getElementsByClassName("discussion_resume");
let form = document.getElementsByTagName("form");
let discussion_id = document.getElementById("discussion_id");
for (let i = 0; i < discussionsResume.length; i++) {
  discussionsResume[i].addEventListener("click", function () {
    let messages = document
      .getElementById("messages")
      .getElementsByTagName("div");
    for (let j = 0; j < messages.length; j++) {
      messages[j].style.display = "none";
    }
    for (let i = 0; i < messages.length; i++) {}
    let message = document.getElementsByClassName(
      discussionsResume[i].getElementsByTagName("h3")[0].innerText
    )[0];
    message.style.display = "flex";

    discussion_id.value =
      discussionsResume[i].getElementsByTagName("h3")[0].innerText;
    form[0].style.display = "flex";
    console.log(discussion_id.value);
  });
}

var message = document.getElementsByClassName("discussion_resume");

//event listener for each discussion_resume
for (let i = 0; i < message.length; i++) {
  message[i].addEventListener("click", test);
}

function test(e) {
  if (e.target.nodeName == "H3" || e.target.nodeName == "P") {
    var number = e.target.parentNode.children[0].innerText;
  } else {
    var number = e.target.children[0].innerText;
  }
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("test").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "views/messageRequest.php?number=" + number, true);
  xmlhttp.send();
}
