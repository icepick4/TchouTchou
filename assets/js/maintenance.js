import { getFlags } from "./functions.js";
const script = document.querySelector('script[src*="maintenance.js"]');
let flag = script.outerHTML;
let delButtonList = document.getElementsByClassName("del-button");
delButtonList = Array.from(delButtonList);
delButtonList.forEach((element) => {
  element.addEventListener("click", function () {
    let id = element.getAttribute("value");
    var xhttp = new XMLHttpRequest();
    xhttp.open(
      "GET",
      "ajax/deleteTrain.php?" +
        "train_id=" +
        id +
        "&user_id=" +
        getFlags(flag)[0],
      true
    );
    xhttp.send();
    location.reload();
  });
});

let input = document.getElementById("search");
input.addEventListener("keyup", recherche);

let cross = document.getElementById("clear-search");
cross.addEventListener("click", function () {
  input.value = "";
  recherche();
});

function recherche() {
  let inputValue = input.value.toLowerCase();
  let x = document.getElementsByTagName("tr");
  console.log(x);

  for (let i = 1; i < x.length; i++) {
    if (!x[i].innerHTML.toLowerCase().includes(inputValue)) {
      x[i].style.display = "none";
    } else {
      x[i].style.display = "table-row";
    }
  }
}
