/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
    navToggle = document.getElementById('nav-toggle'),
    navClose = document.getElementById('nav-close')

/* Menu show */
if (navToggle) {
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu')
    })
}

/* Menu hidden */
if (navClose) {
    navClose.addEventListener('click', () => {
        navMenu.classList.remove('show-menu')
    })
}

/*=============== LOGO REVEAL ===============*/
document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll(".image-stack .image");

    images.forEach((image, index) => {
        // Skip the transition for the last image
        if (index === images.length - 1) {
            image.classList.add('no-transition');
        } else {
            setTimeout(() => {
                image.style.transform = "translateX(0)"; // Move the image into view
                image.style.opacity = "1"; // Make it fully opaque
            }, index * 500); // Adjust the delay as needed
        }
    });
});

const inputs = document.querySelectorAll(".contact-input");

inputs.forEach((input) => {
    input.addEventListener("focus", () => {
        input.parentNode.classList.add("focus");
    });
    input.addEventListener("blur", () => {
        input.parentNode.classList.remove("focus");
    });
});

/*=============== CHANGE BACKGROUND HEADER ===============*/
const blurHeader = () => {
    const header = document.getElementById('header')
    // Add a class if the bottom offset is greater than 50 of the viewport
    this.scrollY >= 50 ? header.classList.add('blur-header')
        : header.classList.remove('blur-header')
}
window.addEventListener('scroll', blurHeader)

/*=============== SCROLL REVEAL ===============*/
const sr = ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: 3000,
    delay: 400,
    // reset: true
})

sr.reveal(`.header__h1, .explore__data, .explore__user, .footer__container, .footer__con, .highlight__container`)
sr.reveal(`.home__card`, { delay: 600, distance: '100px', interval: 100 })
sr.reveal(`.about__data, .join__image, .header__image, .contact, .a-btn, .who__header, .who__subheader, .who__flex`, { origin: 'right' })
sr.reveal(`.about__image, .join__data, .who__image`, { origin: 'left' })
sr.reveal(`.popular__card, .gallery__card, .discover__card, .about__card, .service__card`, { interval: 200 })

/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll('.nav__link')

const linkAction = () => {
    const navMenu = document.getElementById('nav-menu')
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

/*=============== HIGHLIGHT ===============*/
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

/*=============== HIGHLIGHT ===============*/
function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

/*=============== SHOW SCROLL UP ===============*/
const scrollUp = () => {
    const scrollUp = document.getElementById('scroll-up')
    // When the scroll is higher than 350 viewport height, add the show-scroll class to the a tag with the scrollup class
    this.scrollY >= 350 ? scrollUp.classList.add('show-scroll')
        : scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollActive)

/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
var scrollSpy = new bootstrap.ScrollSpy(document.body, {
    target: '#navbar-example'
})
// const sections = document.querySelectorAll('section[id]');

// const scrollActive = () => {
//     const scrollDown = window.scrollY;
//     const headerHeight = document.querySelector('.header').offsetHeight;

//     sections.forEach(current => {
//         const sectionHeight = current.offsetHeight;
//         const sectionTop = current.offsetTop - headerHeight;
//         const sectionId = current.getAttribute('id');
//         const sectionsClass = document.querySelector('.nav__menu a[href*=' + sectionId + ']');

//         // Debugging output to check values
//         console.log(`Section ID: ${sectionId}, Section Top: ${sectionTop}, Section Height: ${sectionHeight}, Scroll Position: ${scrollDown}`);

//         if (scrollDown > sectionTop && scrollDown <= sectionTop + sectionHeight) {
//             sectionsClass.classList.add('active-link');
//         } else {
//             sectionsClass.classList.remove('active-link');
//         }
//     });
// };

// window.addEventListener('scroll', scrollActive);

