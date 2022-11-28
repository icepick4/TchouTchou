import { validatePhone } from './functions.js';

const editFirstName = document.getElementById('edit-first-name');
const editLastName = document.getElementById('edit-last-name');
const editEmail = document.getElementById('edit-mail');
const editPhone = document.getElementById('edit-phone');
const phoneInput = document.getElementById('phone');
const forms = document.getElementsByTagName('form');
const deleteAccount = document.getElementById('delete-account');

//get the flag in src of script
const script = document.querySelector('script[src*="account.js"]');
let flag = script.outerHTML
    .split('flag=')[1]
    .split('type')[0]
    .replace(/['"]+/g, '')
    .replace(/[=]+/g, '');
deleteAccount.addEventListener('click', function prompt() {
    let answer = confirm(flag);
    if (answer) {
        window.location = 'index.php?page=delete_account';
    }
});

forms[2].addEventListener('submit', function (e) {
    console.log(validatePhone(phoneInput.value));
    if (!validatePhone(phoneInput.value)) {
        e.preventDefault();
        forms[2].children[0].style.display = 'block';
    }
});

editFirstName.addEventListener('click', () => {
    const td = document.getElementsByTagName('form')[0];
    console.log(td);
    if (td.style.opacity == '1') {
        td.style.opacity = '0';
    } else {
        for (let i = 0; i < forms.length; i++) {
            forms[i].style.opacity = '0';
        }
        td.style.opacity = '1';
    }
});

editLastName.addEventListener('click', () => {
    const td = document.getElementsByTagName('form')[1];
    console.log(td);
    if (td.style.opacity == '1') {
        td.style.opacity = '0';
    } else {
        for (let i = 0; i < forms.length; i++) {
            forms[i].style.opacity = '0';
        }
        td.style.opacity = '1';
    }
});

editPhone.addEventListener('click', () => {
    const td = document.getElementsByTagName('form')[2];
    console.log(td);
    if (td.style.opacity == '1') {
        td.style.opacity = '0';
    } else {
        for (let i = 0; i < forms.length; i++) {
            forms[i].style.opacity = '0';
        }
        td.style.opacity = '1';
    }
});

editEmail.addEventListener('click', () => {
    const td = document.getElementsByTagName('form')[3];
    console.log(td);
    if (td.style.opacity == '1') {
        td.style.opacity = '0';
    } else {
        for (let i = 0; i < forms.length; i++) {
            forms[i].style.opacity = '0';
        }
        td.style.opacity = '1';
    }
});
