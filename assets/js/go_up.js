let arrow = document.getElementsByClassName('go-up')[0];

arrow.addEventListener('click', function () {
    let scrollToTop = window.setInterval(() => {
        let pos = window.pageYOffset;
        if (pos > 0) {
            window.scrollTo(0, pos - 40); // how far to scroll on each step
        } else {
            window.clearInterval(scrollToTop);
        }
    }, 2);
});

document.addEventListener('scroll', function () {
    if (window.pageYOffset > 500) {
        arrow.style.transform = 'rotate(180deg) translateX(0px)';
    } else {
        arrow.style.transform = 'rotate(180deg) translateX(-150px)';
    }
});
