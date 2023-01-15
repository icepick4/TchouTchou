import { getFlags } from "./functions.js";
const script = document.querySelector('script[src*="staff.js"]');
let flag = script.outerHTML;
let firedButtonList = document.getElementsByClassName("fired-button");
firedButtonList = Array.from(firedButtonList);
firedButtonList.forEach((element) => {
  element.addEventListener("click", function () {
    let id = element.getAttribute("value");
    var xhttp = new XMLHttpRequest();
    xhttp.open(
      "GET",
      "index.php?api=fired_employee&user_id=" + id,
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
