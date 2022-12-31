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
    toggleText();
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
          selectedSeatsId.splice(index, 1);
        }
        checkSeatMaxNumber();
        return;
      }
    }
  }

  //toggle the text for the selected seats and the continue button
  function toggleText() {
    let textContainer = document.querySelector("#textContainer");
    let continueButton = document.querySelector("#continueButton");
    let continueText = document.querySelector("#continueText");
    continueText.style.display = "block";
    continueButton.classList.add("disabled");
    if (selectedSeats.length == 0) {
      textContainer.children[0].classList.remove("none");
      textContainer.children[1].classList.add("none");
    } else {
      textContainer.children[0].classList.add("none");
      textContainer.children[1].classList.remove("none");
      let buffer = textContainer.children[1].innerText;
      textContainer.children[1].innerText =
        buffer.substring(0, buffer.indexOf(":") + 1) +
        " " +
        selectedSeatsId.sort().join(", ");
    }
    if (selectedSeats.length == nbrSeats) {
      continueButton.classList.remove("disabled");
      continueText.style.display = "none";
      continueButton.href = continueButton.href + selectedSeatsId.join("//");
    }
  }

  //check if the number of selected seats is greater than the number of seats to buy and remove the first selected seat
  function checkSeatMaxNumber() {
    if (selectedSeats.length > nbrSeats) {
      selectedSeats[0].classList.remove("selected");
      selectedSeats.shift();
      selectedSeatsId.shift();
    }
  }
}

let currentWagon = 1;
let seatArray = document.querySelector("#seatArray").innerText.split("//");
let nbrSeats = parseInt(document.querySelector("#nbrSeats").innerText);
let selectedSeats = [];
let selectedSeatsId = [];

function loadWagon(id) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("content").innerHTML = this.responseText;
      initWagon();
    }
  };
  xmlhttp.open("GET", "views/TGV.php?id=" + id, true);
  xmlhttp.send();
}

let nextButton = document.querySelector("#next");
nextButton.addEventListener("click", function () {
  currentWagon++;
  changeWagon(currentWagon);
});
let previousButton = document.querySelector("#previous");
previousButton.addEventListener("click", function () {
  currentWagon--;
  changeWagon(currentWagon);
});

function changeWagon(id) {
  currentWagon = id;
  if (currentWagon == 1) {
    previousButton.style.display = "none";
  } else {
    previousButton.style.display = "block";
  }
  if (currentWagon == 8) {
    nextButton.style.display = "none";
  } else {
    nextButton.style.display = "block";
  }
  loadWagon(currentWagon);
}

document.onload = changeWagon(currentWagon);
