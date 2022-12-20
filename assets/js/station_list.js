let input = document.getElementById("search");
input.addEventListener("keyup", recherche);

var stations = [
  "Paris-Gare-De-Lyon",
  "Belfort-Montbeliar-TGV",
  "Besancon-Franche-Compte-TGV",
  "Le-Creusot-TGV",
  "Chalon-sur-Saone",
  "Macon-Loche-TGV",
  "Lyon-Part-Dieu",
  "Lyon-Perrache",
  "Valence-TGV",
  "Valence-Ville",
  "Montelimar",
  "Orange",
  "Avignon-Centre",
  "Montpellier-Saint-Roch",
  "Nimes-Centre",
  "Zurich-Gare-Centrale",
  "Bale-CFF",
  "Dijon-Ville",
];

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
  for (i = 0; i < stations.length; i++) {
    if (stations[i].toUpperCase().includes(val.toUpperCase())) {
      b = document.createElement("DIV");
      b.innerHTML =
        "<strong>" + stations[i].substr(0, val.length) + "</strong>";
      b.innerHTML += stations[i].substr(val.length);
      b.innerHTML += "<input type='hidden' value='" + stations[i] + "'>";
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

function recherche() {
  let inputValue = input.value.toLowerCase();
  let x = document.getElementsByTagName("tr");
  for (let i = 1; i < x.length; i++) {
    if (!x[i].innerHTML.toLowerCase().includes(inputValue)) {
      x[i].style.display = "none";
    } else {
      x[i].style.display = "table-row";
    }
  }
}
