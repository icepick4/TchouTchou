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
