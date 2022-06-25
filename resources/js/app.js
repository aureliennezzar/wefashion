import './bootstrap';
import Swiper, { Autoplay } from 'swiper';
// import Swiper styles
import 'swiper/css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function exist(query) {
    const element = document.querySelector(query)
    return typeof (element) != 'undefined' && element != null
}

if (exist('.product-form')) {
    // Check if at least one checkbox is checked
    const submitBtn = document.querySelector('.product-form .submit-btn')
    const form = document.querySelector('.product-form')
    form.addEventListener('submit', function (e) {
        const checked = document.querySelectorAll('.product-form .size-checkbox:checked').length

        if (!checked) {
            alert("Il faut choisir au moins une taille");
            e.preventDefault();
        }
    })
}

if (exist('.burger')) {
    const burger = document.querySelector('.burger');
    const navLinks = document.querySelector('.nav-links');
    burger.addEventListener("click", function () {
        document.body.classList.toggle('mobile-nav-opened');
        navLinks.classList.toggle('opened')
        burger.classList.toggle('opened')
    })

}
if (exist('.banner-swiper')) {
    const swiper = new Swiper('.banner-swiper', {
        modules: [Autoplay],
        slidesPerView: 1,
        loop: true,
        speed:1000,
        autoplay: {
            delay: 3000,
            duration:2000,
            disableOnInteraction: false
        },
    });
}

