import { validateEmail, validatePassword, validatePhone } from "./functions.js";

const phone = document.getElementsByTagName("input")[2];
const email = document.getElementsByTagName("input")[3];
const password = document.getElementsByTagName("input")[4];
const passwordVerify = document.getElementsByTagName("input")[5];
const form = document.getElementsByTagName("form")[0];
form.addEventListener("submit", formVerify);

function formVerify(evt) {
  if (
    !validatePhone(phone.value) ||
    !validateEmail(email.value) ||
    !validatePassword(password.value) ||
    password.value != passwordVerify.value
  ) {
    evt.preventDefault();
    evt.target.children[0].style.display = "block";
  }
}

phone.addEventListener("change", verify);
email.addEventListener("change", verify);
password.addEventListener("change", verify);
passwordVerify.addEventListener("change", verify);

function verify(evt) {
  let source = evt.target;
  if (callFunction(source)) {
    source.classList.remove("is-invalid");
    source.classList.add("is-valid");
    source.previousElementSibling.style.display = "none";
  } else {
    source.classList.remove("is-valid");
    source.classList.add("is-invalid");
    source.previousElementSibling.style.display = "block";
  }
}

function callFunction(source) {
  if (source.id == "tel") return validatePhone(source.value);
  if (source.id == "email") return validateEmail(source.value);
  if (source.id == "password") return validatePassword(source.value);
  if (source.id == "confirmPassword") return source.value == password.value;
}
