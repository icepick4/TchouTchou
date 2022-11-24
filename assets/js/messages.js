let discussionsResume = document.getElementsByClassName("discussion_resume");
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
  });
}
