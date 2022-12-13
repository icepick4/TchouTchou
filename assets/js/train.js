let seats = document.querySelectorAll(".seat");
let wagon = document.querySelector(".wagon");
//add event for each seat on click
seats.forEach((seat) => {
  seat.addEventListener("click", seatClick);
});

//initialise the seats
function initSeats() {
  let seatNumber = wagon.classList[1] * 40 - 40;
  console.log(seatNumber);
  for (let i = 1; i <= seats.length; i++) {
    seats[i - 1].id = i + seatNumber;
    seats[i - 1].children[1].innerText = i + seatNumber;
  }
}
initSeats();

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

function toggleSeat(id) {
  if (seats[id - 1].classList.contains("reserved")) {
    return;
  }
  seats[id - 1].classList.toggle("selected");
}
