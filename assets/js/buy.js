let input = document.getElementById("search1");
let input2 = document.getElementById("search2");

var stations = document.querySelector("#stationsArray").innerText.split("//");

function searchWithAutocomplete(input, arr) {
  input.addEventListener("keyup", function (event) {
    var a, b, i;
    var val = event.target.value;
    closeAllLists();
    if (!val) {
      return false;
    }
    a = document.createElement("DIV");
    a.setAttribute("id", "autocomplete-list");
    a.setAttribute("class", "autocomplete-items");
    this.parentNode.appendChild(a);
    for (i = 0; i < arr.length; i++) {
      if (arr[i].toUpperCase().includes(val.toUpperCase())) {
        b = document.createElement("DIV");
        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
        b.innerHTML += arr[i].substr(val.length);
        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
        b.addEventListener("click", function (e) {
          input.value = this.getElementsByTagName("input")[0].value;
          closeAllLists();
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

  let cross = document.querySelectorAll(".clear-search");
  cross.forEach((element) => {
    element.addEventListener("click", function (e) {
      e.target.previousElementSibling.value = "";
    });
  });
}

searchWithAutocomplete(input, stations);
searchWithAutocomplete(input2, stations);
