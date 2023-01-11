import {
    getFlags,
    validateEmail,
    validateName,
    validatePhone
} from './functions.js';
import { ConfirmModal, SuccessModal } from './modal.js';
const editFirstName = document.getElementById('edit-first-name');
const editLastName = document.getElementById('edit-last-name');
const editEmail = document.getElementById('edit-mail');
const editPhone = document.getElementById('edit-phone');
const phoneInput = document.getElementById('phone');
const emailInput = document.getElementById('mail');
const lnameInput = document.getElementById('last-name');
const fnameInput = document.getElementById('first-name');
const forms = document.getElementsByTagName('form');
const deconnexion = document.querySelectorAll('.link-profile')[2];
const errorLength = document.getElementById('error-length');
const deleteAccount = document.getElementById('delete-account');
const LANG_CONFIRM = document.querySelector('div#lang #CONFIRM').innerHTML;
const LANG_CANCEL = document.querySelector('div#lang #CANCEL').innerHTML;
const LANG_SUCCES_LOGOUT = document.querySelector(
    'div#lang #SUCCES_LOGOUT'
).innerHTML;
//get the flag in src of script
const script = document.querySelector('script[src*="account.js"]');
let flag = script.outerHTML;
deconnexion.addEventListener('click', function () {
    let modal = new SuccessModal(LANG_SUCCES_LOGOUT, null, 2);
    localStorage.clear();
    setTimeout(() => {
        window.location = 'index.php?page=logout';
    }, 2000);
});

deleteAccount.addEventListener('click', function prompt() {
    let modal = new ConfirmModal(
        getFlags(flag)[0] + ' ?',
        null,
        LANG_CONFIRM,
        LANG_CANCEL
    );
    document.querySelector('#btnmodal-0').addEventListener('click', () => {
        window.location =
            'index.php?page=delete_account&verif=' + getFlags(flag)[1];
    });
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
    } else {
        evt.target.children[0].style.opacity = '0';
    }
    if (emailInput.value.length > 254) {
        evt.preventDefault();
        errorLength.style.display = 'block';
    } else {
        errorLength.style.display = 'none';
    }
}

function phoneCheck(evt) {
    if (!validatePhone(phoneInput.value)) {
        evt.preventDefault();
        evt.target.children[0].style.opacity = '1';
    } else {
        evt.target.children[0].style.opacity = '0';
    }
}

function firstNameCheck(evt) {
    if (!validateName(fnameInput.value)) {
        evt.preventDefault();
        evt.target.children[0].style.opacity = '1';
    } else {
        evt.target.children[0].style.opacity = '0';
    }
    if (fnameInput.value.length > 254) {
        evt.preventDefault();
        errorLength.style.display = 'block';
    } else {
        errorLength.style.display = 'none';
    }
}

function lastNameCheck(evt) {
    if (!validateName(lnameInput.value)) {
        evt.preventDefault();
        evt.target.children[0].style.opacity = '1';
    } else {
        evt.target.children[0].style.opacity = '0';
    }
    if (lnameInput.value.length > 254) {
        evt.preventDefault();
        errorLength.style.display = 'block';
    } else {
        errorLength.style.display = 'none';
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
