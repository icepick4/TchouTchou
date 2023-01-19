let input = document.getElementById("search1");
let input2 = document.getElementById("search2");
var stations = document.querySelector("#stationsArray").innerText.split("//");
let boxArrow = document.querySelector("#boxArrow");

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

boxArrow.addEventListener("click", function () {
  let temp = search1.value;
  search1.value = search2.value;
  search2.value = temp;
  // faut cliquer pour refresh document.querySelector("").click();
});

function searchLines() {
  console.log(
    "index.php?api=travel&from=" + search1.value + "&to=" + search2.value
  );
  var xhttp = new XMLHttpRequest();
  xhttp.open(
    "GET",
    "index.php?api=travel&from=" +
      search1.value +
      "&to=" +
      search2.value +
      "&date=" +
      document.querySelector("#date").value,
    true
  );
  xhttp.send();
  xhttp.onload = function () {
    if (this.status == 200) {
      document.querySelector("#lines").innerHTML = this.responseText;
      let select = document.getElementsByName("line_id");
      select.forEach((element) => {
        let time =
          element.parentElement.parentElement.children[3].getAttribute("value");
        let date = document
          .querySelector("#date")
          .value.split("T")[0]
          .split("-");
        let hour = document
          .querySelector("#date")
          .value.split("T")[1]
          .split(":")[0];
        let minute = document
          .querySelector("#date")
          .value.split("T")[1]
          .split(":")[1];
        let datetime =
          date[2] +
          "/" +
          date[1] +
          "/" +
          date[0][2] +
          date[0][3] +
          " " +
          hour +
          ":" +
          minute;
        element.addEventListener("click", function (e) {
          var xhttp = new XMLHttpRequest();
          xhttp.open(
            "GET",
            "index.php?api=travel_staff&time=" + time + "&datetime=" + datetime,
            true
          );
          xhttp.send();
          xhttp.onload = function () {
            if (this.status == 200) {
              document.querySelector("#staff").innerHTML = this.responseText;
              let select = document.getElementsByName("driver_id");
              select.forEach((element) => {
                let driver_id = element.getAttribute("value");
                element.addEventListener("click", function (e) {
                  var xhttp = new XMLHttpRequest();
                  xhttp.open(
                    "GET",
                    "index.php?api=travel_train&driver_id=" +
                      driver_id +
                      "&datetime=" +
                      datetime +
                      "&time=" +
                      time,
                    true
                  );
                  xhttp.send();
                  xhttp.onload = function () {
                    if (this.status == 200) {
                      document.querySelector("#train").innerHTML =
                        this.responseText;
                      this.responseText;
                    }
                  };
                });
              });
            }
          };
        });
      });
    }
  };
}

document.querySelector("#lineButton").addEventListener("click", searchLines);
