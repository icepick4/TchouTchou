const LANG_LOGIN_NEEDED = document.querySelector(
    '#lang #LOGIN_NEEDED'
).innerHTML;
let arrow = document.getElementById('header-button');

arrow.addEventListener('click', function () {
    let ul = document.querySelector('header nav ul');
    let nav = document.querySelector('header nav:first-child');
    rotateArrow();
    if (ul.style.display === 'flex') {
        ul.style.display = 'none';
        nav.style.flexDirection = 'row';
        return;
    }
    nav.style.flexDirection = 'column';
    ul.style.display = 'flex';
});

function rotateArrow() {
    arrow.classList.toggle('rotate');
}

import { getFlags } from './functions.js';
import { SuccessModal } from './modal.js';

const script = document.querySelector('script[src*="header.js"]');
let flag = script.outerHTML;
let achat = document.querySelector(
    'body > header:nth-child(1) > nav:nth-child(1) > ul:nth-child(2) > li:nth-child(1) > a:nth-child(1)'
);

if (getFlags(flag)[0] == ' ') {
    achat.href = '#';
    achat.addEventListener('click', function () {
        achat.disabled;
        let modal = new SuccessModal(LANG_LOGIN_NEEDED, null, 2);
        localStorage.clear();
        setTimeout(() => {
            if (window.location.href.split('page=')[1] != 'login#') {
                window.location = 'index.php?page=login';
            }
        }, 2000);
    });
}
