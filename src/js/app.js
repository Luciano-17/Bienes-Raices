'use strict';

document.addEventListener('DOMContentLoaded', function () {
    darkMode();

    mobileMenu();

    camposCondicionales();
})

// DARK MODE
function darkMode () {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    const darkMode = document.querySelector('#darkMode');
    const body = document.querySelector('#body');

    if (prefiereDarkMode.matches) {
        document.body.classList.add('body-darkMode');
    } else {
        document.body.classList.remove('body-darkMode');
    }

    prefiereDarkMode.addEventListener('change', () => {
        if (prefiereDarkMode.matches) {
            document.body.classList.add('body-darkMode');
        } else {
            document.body.classList.remove('body-darkMode');
        }
    });

    darkMode.addEventListener('click', () => {
        body.classList.toggle('body-darkMode');
    });
}
// END DARK MODE

// MENU MOBILE
function mobileMenu () {
    const mobileMenu = document.querySelector('#mobile-menu');

    mobileMenu.addEventListener('click', () => {
        const navegacion = document.querySelector('.navegacion-principal');

       navegacion.classList.toggle('mostrar');
    });
}
// END MENU MOBILE

// Mostrar campos condicionales
function camposCondicionales () {
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    
    // Cuando seleccionamos muchos elementos del mismo tipo debemos iterar sobre cada uno de ellos para agregarle el mismo evento, con un foreach
    metodoContacto.forEach(input => input.addEventListener('click', mostrarCondicional));
}
function mostrarCondicional (e) {
    const contactoDiv = document.querySelector('#contacto');

    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
        <input type="tel" placeholder="Teléfono" name="contacto[telefono]" required>
        
        <p>Eliga la fecha y hora para la llamada:</p>

        <div class="contenido-contacto fecha">
            <input type="date" name="contacto[fecha]">
            <input type="time" min="09:00" max="18:00" name="contacto[hora]">
        </div>
        `;
    } else {
        contactoDiv.innerHTML = `<input type="email" placeholder="Email" name="contacto[email]" required>`;
    }
}