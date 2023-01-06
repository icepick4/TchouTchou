document.querySelectorAll(".travel").forEach((travel) => {
  travel.addEventListener("click", (e) => {
    console.log(e.target);
    let id = e.target.getAttribute("value");
    openModal(id);
  });
});

function openModal(id) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("modal").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "ajax/planning_info.php?id=" + id, true);
  xmlhttp.send();
}
