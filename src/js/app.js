document.addEventListener('DOMContentLoaded', () => {
    eventListeners();
    darkMode();
});

// Responsive Menu
function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', responsiveMenu);

    // Show and hide fields of the form
    const contactMethod = document.querySelectorAll('input[name="contact[contact]"]');
    contactMethod.forEach(input => input.addEventListener('click', showContactMethods));
}

function responsiveMenu() {
    const navigation = document.querySelector('.navigation');
    navigation.classList.toggle('show'); // toggle: si tiene la clase la quita, si no la tiene la agrega
}

// Dark Mode
function darkMode() {
    const preference = window.matchMedia('(prefers-color-scheme: dark)');
    if (preference.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    // Read if the user changes the theme
    preference.addEventListener('change', () => {
        if (preference.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const darkMode = document.querySelector('.dark-mode-button');

    darkMode.addEventListener('click', () => {
        console.log('click');
        document.body.classList.toggle('dark-mode');
    });
}

// Make alert disappear
setTimeout(() => {
    const alert = document.querySelector('.alert.success');
    if (alert) {
        alert.remove();
    }
}, 5000); // 5 seconds

function showContactMethods(e) {
    const contactDiv = document.querySelector('#contact');
    
    if(e.target.value === 'phone'){
        contactDiv.innerHTML = `
            <label for="phone">Phone Number</label>
            <input type="tel" placeholder="Your Phone Number" id="phone" name="contact[phone]">

            <p>Select a date and time for the call</p>
            <label for="date">Date: </label>
            <input type="date" id="date"  name="contact[date]">

            <label for="time">Time: </label>
            <input type="time" id="time" min="09:00" max="18:00"  name="contact[time]">
        `;
    } else{
        contactDiv.innerHTML = `
            <label for="email">E-Mail</label>
            <input type="email" placeholder="Your E-Mail" id="email" name="contact[email]" required>
        `;
    }
}