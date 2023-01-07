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
