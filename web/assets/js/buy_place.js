function initWagon() {
  let seats = document.querySelectorAll(".seat");
  let wagon = document.querySelectorAll(".wagon");
  //add event for each seat on click
  seats.forEach((seat) => {
    seat.addEventListener("click", seatClick);
  });

  //take the seat number from the seat clicked
  function seatClick(e) {
    let seat;
    if (e.target.nodeName == "svg") {
      seat = e.target.parentNode;
    } else if (e.target.nodeName == "P") {
      seat = e.target.parentNode;
    } else {
      seat = e.target.parentNode.parentNode;
    }
    procedClick(seat.id);
  }

  //initialise the seats with the correct seat number
  (function () {
    let seatNumber;
    let maxSeat;
    let currentSeat = 1;
    let selectedSeatsId = [];
    for (let i = 0; i < selectedSeats.length; i++) {
      selectedSeatsId.push(selectedSeats[i].id);
    }
    for (let i = 0; i < wagon.length; i++) {
      if (wagon[i].parentElement.classList.contains("duplex")) {
        maxSeat = 34;
      } else if (wagon[i].parentElement.classList.contains("nol")) {
        maxSeat = 38;
      } else {
        maxSeat = 40;
      }
      seatNumber = wagon[i].classList[1] * maxSeat - maxSeat;
      for (let i = 1; i <= maxSeat; i++) {
        seats[currentSeat - 1].id = seatNumber + i;
        seats[currentSeat - 1].children[1].innerText = seatNumber + i;
        if (seatArray.includes(seats[currentSeat - 1].id)) {
          seats[currentSeat - 1].classList.add("reserved");
        }
        if (selectedSeatsId.includes(seats[currentSeat - 1].id)) {
          seats[currentSeat - 1].classList.add("selected");
        }
        currentSeat++;
      }
    }
  })();

  function procedClick(id) {
    toggleSeat(id);
  }

  //toggle a class on the seat with the correct id
  function toggleSeat(id) {
    for (let i = 0; i < seats.length; i++) {
      if (seats[i].id == id) {
        if (seats[i].classList.contains("reserved")) {
          return;
        }
        if (!seats[i].classList.contains("selected")) {
          seats[i].classList.toggle("selected");
          selectedSeats.push(seats[i]);
        } else {
          seats[i].classList.toggle("selected");
          let index;
          for (let j = 0; j < selectedSeats.length; j++) {
            if (selectedSeats[j].id == id) {
              index = j;
            }
          }
          selectedSeats.splice(index, 1);
        }

        toggleText();
        return;
      }
    }
  }

  //toggle the text for the selected seats and the continue button
  function toggleText() {
    if (selectedSeats.length > nbrSeats) {
      if (document.getElementById(selectedSeats[0].id) != null) {
        document
          .getElementById(selectedSeats[0].id)
          .classList.remove("selected");
      }
      selectedSeats[0].classList.remove("selected");
      selectedSeats.shift();
    }
    seatChoice = false;
    let continueButton = document.querySelector("#continueButton");
    let continueText = document.querySelector("#continueText");
    continueText.style.display = "block";
    continueButton.classList.add("disabled");
    let selectedSeatsId = [];

    for (let i = 0; i < selectedSeats.length; i++) {
      selectedSeatsId.push(selectedSeats[i].id);
    }
    let selectedSeatsIdSorted = selectedSeatsId.sort((a, b) => a - b);
    for (let i = 1; i <= nbrSeats; i++) {
      let seat = document.getElementById("seat_" + i);
      if (selectedSeatsIdSorted[i - 1] == undefined) {
        seat.innerText = "";
      } else {
        seat.innerText = selectedSeatsIdSorted[i - 1];
      }
    }
    if (selectedSeats.length == nbrSeats) {
      seatChoice = true;
      continueText.style.display = "none";
      document.querySelector("#seat").value = selectedSeatsIdSorted.join("//");
    }
    checkform();
  }
}

let currentWagon = 1;
let seatChoice = true;
let seatArray = document.querySelector("#seatArray").innerText.split("//");
let nbrSeats = parseInt(document.querySelector("#nbrSeats").innerText);
let selectedSeats = [];
let form = document.getElementsByTagName("form")[0];
form.addEventListener("submit", checkSubmit);
let seats = document.getElementsByTagName("fieldset");
let inputs = document.querySelectorAll("fieldset input");
let errorNames = document.getElementById("error-names");
let errorNamesPeople = document.getElementById("error-names-people");
let errorNameEmpty = document.getElementById("error-names-empty");
var nextButton;
var previousButton;

//add event for each input on click
inputs.forEach((input) => {
  input.addEventListener("keyup", checkForm);
});

//check if the form is valid
function checkForm() {
  if (seatChoice) {
    document.querySelector("#continueButton").classList.remove("disabled");
  } else {
    document.querySelector("#continueButton").classList.add("disabled");
  }
}

function checkSubmit(evt) {
  inputs.forEach((input) => {
    if (input.value == "") {
      evt.preventDefault();
      errorNameEmpty.style.display = "block";
    }
  });
  for (let i = 0; i < seats.length; i++) {
    let input1 = seats[i].children[1].children[0].children[1].value;
    let input2 = seats[i].children[1].children[1].children[1].value;
    if (input1 === input2 && input1 != "") {
      errorNames.style.display = "block";
      errorNameEmpty.style.display = "none";
      errorNamesPeople.style.display = "none";
      evt.preventDefault();
    }
    //check if this couple of input1/input2 doesnt exist yet
    for (let j = i + 1; j < seats.length; j++) {
      let input3 = seats[j].children[1].children[0].children[1].value;
      let input4 = seats[j].children[1].children[1].children[1].value;
      if (input1 == input3 && input2 == input4) {
        errorNamesPeople.style.display = "block";
        errorNames.style.display = "none";
        errorNameEmpty.style.display = "none";
        evt.preventDefault();
      }
    }
  }
}

function loadWagon(id) {
  let typeTrain = document.querySelector("#typeTrain");
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML = this.responseText;
      initWagon();
    }
  };
  if (typeTrain.innerText == "TGV") {
    xmlhttp.open("GET", "index.php?api=TGV&id=" + id, true);
  } else if (typeTrain.innerText == "TGVDuplex") {
    xmlhttp.open("GET", "index.php?api=TGV_duplex&id=" + id, true);
  } else if (typeTrain.innerText == "TGVNOL") {
    xmlhttp.open("GET", "index.php?api=TGV_NOL&id=" + id, true);
  } else {
    console.log("error");
  }
  xmlhttp.send();
  if (typeTrain.innerText == "TGVDuplex") {
    setTimeout(function () {
      changeFloor();
    }, 300);
  }
}

function changeWagon(id) {
  currentWagon = id;
  if (currentWagon == 1) {
    previousButton.classList.add("disabled");
  } else {
    previousButton.classList.remove("disabled");
  }
  if (currentWagon == 8) {
    nextButton.classList.add("disabled");
  } else {
    nextButton.classList.remove("disabled");
  }
  loadWagon(currentWagon);
}

if (document.querySelector("#content") != null) {
  nextButton = document.querySelector("#next");
  nextButton.addEventListener("click", function () {
    currentWagon++;
    changeWagon(currentWagon);
  });
  previousButton = document.querySelector("#previous");
  previousButton.addEventListener("click", function () {
    currentWagon--;
    changeWagon(currentWagon);
  });

  seatChoice = false;
  document.onload = changeWagon(currentWagon);
}

let slider = document.querySelector(".switch");

if (slider != null) {
  slider.addEventListener("click", function () {
    changeFloor();
  });
}

function changeFloor() {
  let input = document.querySelector(".switch input");
  let down = document.querySelector(".wagon:last-child");
  let up = document.querySelector(".wagon");
  if (input.checked) {
    down.style.display = "none";
    up.style.display = "flex";
  } else {
    down.style.display = "flex";
    up.style.display = "none";
  }
}

function findSameNames(firstName, lastName, firstName2, lastName2) {
  return firstName == firstName2 && lastName == lastName2;
}
