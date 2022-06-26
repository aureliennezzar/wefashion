import './bootstrap';
import Swiper, {Autoplay} from 'swiper';
import gsap from 'gsap';
import {ScrollTrigger} from "gsap/ScrollTrigger.js";
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

if (exist('.gsap-fade-up')) {

    gsap.registerPlugin(ScrollTrigger)
    if(exist('.home-template')){
        const startTL = gsap.timeline()
        startTL
            .to('.nav-links .link', {autoAlpha: 1, y: 0, stagger: 0.2, delay: 0.2})
            .to('.brand-link', {autoAlpha: 1, y: 0})
    }
    gsap.to('.product-card', {
        scrollTrigger: {
            trigger: ".products__grid",
            start:"20% bottom",
        },
        autoAlpha: 1,
        y: 0,
        duration:0.3,
        stagger: 0.3
    })
}

if (exist('.banner-swiper')) {
    const swiper = new Swiper('.banner-swiper', {
        modules: [Autoplay],
        slidesPerView: 1,
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 3000,
            duration: 2000,
            disableOnInteraction: false
        },
    });
}

