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
