import './bootstrap';

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
    form.addEventListener('submit',function(e){
        const checked = document.querySelectorAll('.product-form .size-checkbox:checked').length

        if (!checked) {
            alert("Il faut choisir au moins une taille");
            e.preventDefault();
        }
    })
}
