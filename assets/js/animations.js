/* Quand la fenêtre a fini de se charger */
window.addEventListener('load', function () {
    movePaw();// Patte en arrière plan
    if (!!document.getElementById('notification')) {
        drawNotif();// Notification
    }
});

/* BARRE DE NAVIGUATION */
const phone = window.matchMedia("(max-width: 576px)");
const tab = window.matchMedia("(min-width: 576px) and (max-width: 1023px)");
const desktop = window.matchMedia("(min-width: 1024px)");

function mediaPhone(e) {
    if (e.matches) {
        const navbar = document.querySelector('#menutop');
        navbar.classList.remove('nav');
        navbar.classList.remove('nav-underline');
        navbar.classList.remove('nav-fill');
        navbar.classList.remove('justify-content-center');
        navbar.classList.remove('p-2');
        navbar.className = 'collapse p-4 bg-dark';
    }
}
function mediaTab(e) {
    if (e.matches) {
        const navbar = document.querySelector('#menutop');
        navbar.classList.remove('collapse');
        navbar.classList.remove('p-4');
        navbar.classList.remove('bg-dark');
        navbar.className = 'nav nav-underline nav-fill justify-content-center bg-dark p-2';
    }
}
function mediaDesktop(e) {
    if (e.matches) {
        const navbar = document.querySelector('#menutop');
        navbar.classList.remove('collapse');
        navbar.classList.remove('p-4');
        navbar.classList.remove('bg-dark');
        navbar.className = 'nav nav-underline nav-fill justify-content-center bg-dark p-2';
    }
}
phone.addEventListener("change", mediaPhone);
tab.addEventListener("change", mediaTab);
desktop.addEventListener("change", mediaDesktop);

mediaPhone(phone), mediaTab(tab), mediaDesktop(desktop);

/* PATTE EN ARRIERE PLAN */
// Fonction pour récupérer une poisition random sur la page
function getRandomPosition() {
    const x = Math.floor(Math.random() * document.querySelector('main').clientWidth);
    const y = Math.floor(Math.random() * 300);
    return { x, y };
}
//Fonction pour changer la patte de position
function movePaw() {
    const paw = document.querySelector('#paw');
    const { x, y } = getRandomPosition();
    paw.style.bottom = y + "px";
    paw.style.right = x + "px";
}
setInterval(movePaw, 5000);

/* NOTIFICATIONS */
function drawNotif() {
    const idNotification = document.getElementById('notification');
    const notification = bootstrap.Toast.getOrCreateInstance(idNotification);
    notification.show();
}


