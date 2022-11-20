export function validateEmail(email) {
  var regExEmail =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regExEmail.test(String(email).toLowerCase());
}

export function validatePassword(password) {
  var regExPassword = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");
  return regExPassword.test(password);
}

export function validatePhone(phoneNumber) {
  var regExPhone = /^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/g;
  return regExPhone.test(phoneNumber);
}

export function validateName(name) {
  var regExName = /^[a-zA-ZÀ-ÿ\u00f1\u00d1\u00E0-\u00FC\s-']+$/;
  return regExName.test(name);
}

function lineClick(event) {
  alert("click");
}
