import { validateEmail } from './functions.js';
import { validatePhone } from './functions.js';
import { validateName } from './functions.js';

const email = document.getElementById('email');
const tel = document.getElementById('tel');
const name = document.getElementById('name');
const fname = document.getElementById('fname');
const subject = document.getElementById('subject');
const desc = document.getElementById('desc');
const error = document.querySelectorAll('.error');

const form = document.getElementsByTagName('form')[0];
form.addEventListener('submit', formVerify);

name.addEventListener('change', function () {
	if (validateName(name.value)) {
		name.classList.remove('is-invalid');
		name.classList.add('is-valid');
		error[0].classList.add('shown');
	} else {
		name.classList.remove('is-valid');
		name.classList.add('is-invalid');
		error[0].classList.remove('shown');
	}
});

fname.addEventListener('change', function () {
	if (validateName(fname.value)) {
		fname.classList.remove('is-invalid');
		fname.classList.add('is-valid');
		error[1].classList.add('shown');
	} else {
		fname.classList.remove('is-valid');
		fname.classList.add('is-invalid');
		error[1].classList.remove('shown');
	}
});

tel.addEventListener('change', function () {
	if (validatePhone(tel.value)) {
		tel.classList.remove('is-invalid');
		error[2].classList.add('shown');
	} else {
		tel.classList.add('is-invalid');
		error[2].classList.remove('shown');
	}
});

email.addEventListener('change', function () {
	if (validateEmail(email.value)) {
		email.classList.remove('is-invalid');
		email.classList.add('is-valid');
		error[3].classList.add('shown');
	} else {
		email.classList.remove('is-valid');
		email.classList.add('is-invalid');
		error[3].classList.remove('shown');
	}
});

subject.addEventListener('change', function () {
	if (subject.value.length > 5) {
		subject.classList.remove('is-invalid');
		error[4].classList.add('shown');
	} else {
		subject.classList.add('is-invalid');
		error[4].classList.remove('shown');
	}
});

desc.addEventListener('change', function () {
	if (desc.value.length > 10) {
		desc.classList.remove('is-invalid');
		error[5].classList.add('shown');
	} else {
		desc.classList.add('is-invalid');
		error[5].classList.remove('shown');
	}
});

function formVerify(evt) {
	if (email && tel && name && fname) {
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
		error[6].classList.remove('shown');
	} else {
		error[6].classList.add('shown');
	}
}
