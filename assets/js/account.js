import { validatePhone } from './functions.js';

const editFirstName = document.getElementById('edit-first-name');
const editLastName = document.getElementById('edit-last-name');
const editEmail = document.getElementById('edit-mail');
const editPhone = document.getElementById('edit-phone');
const phoneInput = document.getElementById('phone');
const table = document.getElementById('table');
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
    const tr = table.getElementsByTagName('tr')[0];
    const td = tr.children[tr.children.length - 1];
    if (td.style.display == 'block') {
        td.style.display = 'none';
    } else {
        td.style.display = 'block';
    }
});

editLastName.addEventListener('click', () => {
    const tr = table.getElementsByTagName('tr')[1];
    const td = tr.children[tr.children.length - 1];
    if (td.style.display == 'block') {
        td.style.display = 'none';
    } else {
        td.style.display = 'block';
    }
});

editPhone.addEventListener('click', () => {
    const tr = table.getElementsByTagName('tr')[2];
    const td = tr.children[tr.children.length - 1];
    if (td.style.display == 'block') {
        td.style.display = 'none';
    } else {
        td.style.display = 'block';
    }
});

editEmail.addEventListener('click', () => {
    const tr = table.getElementsByTagName('tr')[3];
    const td = tr.children[tr.children.length - 1];
    if (td.style.display == 'block') {
        td.style.display = 'none';
    } else {
        td.style.display = 'block';
    }
});
