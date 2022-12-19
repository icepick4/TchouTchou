import {
    getFlags,
    validateEmail,
    validateName,
    validatePhone
} from './functions.js';
const editFirstName = document.getElementById('edit-first-name');
const editLastName = document.getElementById('edit-last-name');
const editEmail = document.getElementById('edit-mail');
const editPhone = document.getElementById('edit-phone');
const phoneInput = document.getElementById('phone');
const emailInput = document.getElementById('mail');
const lnameInput = document.getElementById('last-name');
const fnameInput = document.getElementById('first-name');
const forms = document.getElementsByTagName('form');
const deleteAccount = document.getElementById('delete-account');
//get the flag in src of script
const script = document.querySelector('script[src*="account.js"]');
let flag = script.outerHTML;
deleteAccount.addEventListener('click', function prompt() {
    let answer = confirm(getFlags(flag)[0]);
    if (answer) {
        window.location =
            'index.php?page=delete_account&verif=' + getFlags(flag)[1];
    }
});

for (let i = 0; i < forms.length; i++) {
    switch (i) {
        case 0:
            forms[i].addEventListener('submit', firstNameCheck);
            break;
        case 1:
            forms[i].addEventListener('submit', lastNameCheck);
            break;
        case 2:
            forms[i].addEventListener('submit', phoneCheck);
            break;
        case 3:
            forms[i].addEventListener('submit', mailCheck);
            break;
    }
}

function mailCheck(evt) {
    if (!validateEmail(emailInput.value)) {
        evt.preventDefault();
        evt.target.children[0].style.opacity = '1';
    }
}

function phoneCheck(evt) {
    if (!validatePhone(phoneInput.value)) {
        evt.preventDefault();
        evt.target.children[0].style.opacity = '1';
    }
}

function firstNameCheck(evt) {
    if (!validateName(fnameInput.value)) {
        evt.preventDefault();
        evt.target.children[0].style.opacity = '1';
    }
}

function lastNameCheck(evt) {
    if (!validateName(lnameInput.value)) {
        evt.preventDefault();
        evt.target.children[0].style.opacity = '1';
    }
}

editFirstName.addEventListener('click', () => {
    //display the form is it is hidden otherwise hide it
    removeAllDisplay(0);
    forms[0].classList.toggle('display-input');
});

editLastName.addEventListener('click', () => {
    removeAllDisplay(1);
    forms[1].classList.toggle('display-input');
});

editPhone.addEventListener('click', () => {
    removeAllDisplay(2);
    forms[2].classList.toggle('display-input');
});

editEmail.addEventListener('click', () => {
    removeAllDisplay(3);
    forms[3].classList.toggle('display-input');
});

function removeAllDisplay(form) {
    for (let i = 0; i < forms.length; i++) {
        if (i != form) {
            forms[i].classList.remove('display-input');
            forms[i].children[0].style.opacity = '0';
        }
    }
}
