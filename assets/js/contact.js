import { validateEmail } from "./functions.js";
import { validatePhone } from "./functions.js";
import { validateName } from "./functions.js";

const email = document.getElementById("email");
const tel = document.getElementById("tel");
const info = document.getElementById("info");
const name = document.getElementById("name");
const fname = document.getElementById("fname");
const subject = document.getElementById("subject");
const desc = document.getElementById("desc");
const error = document.querySelectorAll(".error");

const form = document.getElementsByTagName("form")[0];
form.addEventListener("submit", formVerify);

name.addEventListener("change", function () {
  if (validateName(name.value)) {
    name.classList.remove("is-invalid");
    name.classList.add("is-valid");
    error[0].classList.add("shown");
    info.style.display = "none";
  } else {
    name.classList.remove("is-valid");
    name.classList.add("is-invalid");
    error[0].classList.remove("shown");
    info.style.display = "block";
  }
});

fname.addEventListener("change", function () {
  if (validateName(fname.value)) {
    fname.classList.remove("is-invalid");
    fname.classList.add("is-valid");
    error[1].classList.add("shown");
    info.style.display = "none";
  } else {
    fname.classList.remove("is-valid");
    fname.classList.add("is-invalid");
    error[1].classList.remove("shown");
    info.style.display = "block";
  }
});

tel.addEventListener("change", function () {
  if (validatePhone(tel.value)) {
    tel.classList.remove("is-invalid");
    error[2].classList.add("shown");
    info.style.display = "none";
  } else {
    tel.classList.add("is-invalid");
    error[2].classList.remove("shown");
    info.style.display = "block";
  }
});

email.addEventListener("change", function () {
  if (validateEmail(email.value)) {
    email.classList.remove("is-invalid");
    email.classList.add("is-valid");
    error[3].classList.add("shown");
    info.style.display = "none";
  } else {
    email.classList.remove("is-valid");
    email.classList.add("is-invalid");
    error[3].classList.remove("shown");
    info.style.display = "block";
  }
});

subject.addEventListener("change", function () {
  if (subject.value.length > 5) {
    subject.classList.remove("is-invalid");
    error[4].classList.add("shown");
    info.style.display = "none";
  } else {
    subject.classList.add("is-invalid");
    error[4].classList.remove("shown");
    info.style.display = "block";
  }
});

desc.addEventListener("change", function () {
  if (desc.value.length > 10) {
    desc.classList.remove("is-invalid");
    error[5].classList.add("shown");
    info.style.display = "none";
  } else {
    desc.classList.add("is-invalid");
    error[5].classList.remove("shown");
    info.style.display = "block";
  }
});

function formVerify(evt) {
  if (email && tel && info && name && fname) {
    var verif =
      validateEmail(email.value) &&
      validatePhone(tel.value) &&
      validateName(name.value) &&
      validateName(fname.value);
  } else {
    var verif = true;
  }
  if (!verif) {
    evt.preventDefault();
    error[6].classList.remove("shown");
    info.style.display = "block";
  } else {
    error[6].classList.add("shown");
  }
}

// name.addEventListener(
//     "change",
//     validate(validateName(name.value), name, "ERROR_NAME")
//   );
//   fname.addEventListener(
//     "change",
//     validate(validateName(fname.value), fname, "ERROR_FIRSTNAME")
//   );
//   email.addEventListener(
//     "change",
//     validate(validateEmail(email.value), email, "ERROR_MAIL")
//   );
//   tel.addEventListener(
//     "change",
//     validate(validatePhone(tel.value), tel, "ERROR_PHONE")
//   );
//   subject.addEventListener(
//     "change",
//     validate(subject.value.length > 5, subject, "ERROR_CHARACTER")
//   );
//   desc.addEventListener(
//     "change",
//     validate(desc.value.length > 10, desc, "ERROR_CHARACTER")
//   );

//   function validate(verif, input, error) {
//     if (verif) {
//       input.classList.remove("is-invalid");
//       info.style.display = "none";
//     } else {
//       console.log("ouaaa");
//       input.classList.add("is-invalid");
//       info.innerHTML = "<?= " + error + " ?>";
//       info.style.display = "block";
//     }
//   }
