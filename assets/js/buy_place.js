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
    for (let i = 0; i < wagon.length; i++) {
      if (wagon[i].parentElement.classList.contains("duplex")) {
        maxSeat = 34;
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
          selectedSeatsId.push(seats[i].id);
        } else {
          seats[i].classList.toggle("selected");
          let index = selectedSeats.indexOf(seats[i]);
          selectedSeats.splice(index, 1);
          index = selectedSeatsId.indexOf(seats[i].id);
          selectedSeatsId.splice(index, 1);
        }
        checkSeatMaxNumber();
        return;
      }
    }
  }

  //toggle the text for the selected seats and the continue button
  function toggleText() {
    seatChoice = false;
    let continueButton = document.querySelector("#continueButton");
    let continueText = document.querySelector("#continueText");
    continueText.style.display = "block";
    continueButton.classList.add("disabled");
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
      document.querySelector("#seat").value = selectedSeatsId.join("//");
    }
  }

  //check if the number of selected seats is greater than the number of seats to buy and remove the first selected seat
  function checkSeatMaxNumber() {
    if (selectedSeats.length > nbrSeats) {
      selectedSeats[0].classList.remove("selected");
      selectedSeats.shift();
      selectedSeatsId.shift();
    }
    toggleText();
  }
}

let currentWagon = 1;
let seatChoice = true;
let seatArray = document.querySelector("#seatArray").innerText.split("//");
let nbrSeats = parseInt(document.querySelector("#nbrSeats").innerText);
let selectedSeats = [];
let selectedSeatsId = [];
let inputs = document.querySelectorAll("fieldset input");
var nextButton;
var previousButton;

//add event for each input on click
inputs.forEach((input) => {
  input.addEventListener("keyup", checkform);
});

//check if the form is valid
function checkform() {
  let valid = true;
  inputs.forEach((input) => {
    if (input.value == "") {
      valid = false;
    }
  });
  if (valid && seatChoice) {
    document.querySelector("#continueButton").classList.remove("disabled");
  } else {
    document.querySelector("#continueButton").classList.add("disabled");
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
    xmlhttp.open("GET", "views/TGV.php?id=" + id, true);
  } else if (typeTrain.innerText == "TGVDuplex") {
    xmlhttp.open("GET", "views/TGVDuplex.php?id=" + id, true);
  } else {
    console.log("error");
  }
  xmlhttp.send();
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
