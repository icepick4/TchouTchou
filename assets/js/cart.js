let openButton = document.querySelector("#shop");
openButton.addEventListener("click", toggleCart);
let cart = document.querySelector("#cart");
let closeButton = document.querySelector(".close");
closeButton.addEventListener("click", toggleCart);

function toggleCart() {
  cart.classList.toggle("active");
}
