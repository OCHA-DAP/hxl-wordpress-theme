// vars
const accordions = document.getElementsByClassName('accordion__title');
const navbar = document.getElementsByClassName('primary-nav')[0];
const mobile_nav_toggle = document.getElementsByClassName('mobile-nav-toggle')[0];

// accordion
let i;
for (i = 0; i < accordions.length; i++) {
    accordions[i].addEventListener('click', function () {
        /* Toggle between adding and removing the 'accordion__body--hidden' class,
        to highlight the button that controls the panel */
        let panel = this.nextElementSibling;
        panel.classList.toggle('accordion__body--hidden');
        this.classList.toggle('accordion__title--open');
    });
}

// mobile nav
mobile_nav_toggle.addEventListener('click', function () {
    let nav = document.getElementById('primary-nav-menu');
    nav.classList.toggle('active');
});

// fixed mobile menu on scroll
const onScroll = () => {
    // get scroll value
    const scroll = document.documentElement.scrollTop;

    // if scroll value is more than 0 - add class
    if (scroll > 0) {
        navbar.classList.add('fixed');
    } else {
        navbar.classList.remove('fixed');
    }
}
// use the function
window.addEventListener('scroll', onScroll);