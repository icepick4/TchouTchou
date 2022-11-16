import { validateEmail } from './functions.js';

const email = document.getElementsByTagName('input')[0];
const form = document.getElementsByTagName('form')[0];
form.addEventListener('submit', formVerify);
const info = document.getElementById('info');

email.addEventListener('change', function () {
    if (validateEmail(email.value)) {
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
        info.style.display = 'none';
    } else {
        email.classList.remove('is-valid');
        email.classList.add('is-invalid');
        info.innerHTML = 'Invalid email address';
        info.style.display = 'block';
    }
});

function formVerify(evt) {
    let verif = validateEmail(email.value);
    if (!verif) {
        evt.preventDefault();
        email.classList.add('is-invalid');
        info.innerHTML = 'Please enter a valid email address to continue';
        info.style.display = 'block';
    }
}
