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
    let scroll =
        (window.scrollY / (document.body.scrollHeight - window.innerHeight)) *
        100;
    console.log(scroll);
    console.log(window.innerHeight);
    if (scroll < 10) {
        arrow.classList.add('hidden-go-up');
    } else if (
        10 <= scroll &&
        scroll <= 98 &&
        document.body.scrollHeight > 1000
    ) {
        arrow.classList.remove('hidden-go-up');
        arrow.classList.remove('footer-go-up');
    } else if (scroll > 98 && document.body.scrollHeight > 1000) {
        arrow.classList.add('footer-go-up');
    }
});
