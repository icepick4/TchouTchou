(function () {
  let seats = document.querySelectorAll(".seat");
  let wagon = document.querySelectorAll(".wagon");
  //add event for each seat on click
  seats.forEach((seat) => {
    seat.addEventListener("click", seatClick);
  });

  //initialise the seats with the correct seat number
  function initSeats() {
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
        currentSeat++;
      }
    }
  }
  initSeats();

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
    toggleSeat(seat.id);
  }

  //toggle a class on the seat with the correct id
  function toggleSeat(id) {
    for (let i = 0; i < seats.length; i++) {
      if (seats[i].id == id) {
        if (seats[i].classList.contains("reserved")) {
          return;
        }
        seats[i].classList.toggle("selected");
        return;
      }
    }
  }
})();
