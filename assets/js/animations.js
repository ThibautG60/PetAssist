/* Quand la fenêtre a fini de se charger */
window.addEventListener('load', function () {
    movePaw();// On appel la fonction pour bouger la patte de place
    if (!!document.getElementById('notification')) {
        drawNotif();// Si l'élément 'notifications' existe on appel la fonction pour afficher la notifiction
    }
});

/* NAVBAR: Medias queries */
const phone = window.matchMedia("(max-width: 576px)"); //Dimensions pour le mobile
const tab = window.matchMedia("(min-width: 576px) and (max-width: 1023px)");// Dimensions pour la tablette
const desktop = window.matchMedia("(min-width: 1024px)");// Dimensions pour les ordinateurs de bureau

function mediaPhone(e) {// On adapte la NAVBAR pour les téléphones (boutton burger)
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
function mediaTab(e) {// On adapte la NAVBAR pour les tablettes (3x par ligne)
    if (e.matches) {
        const navbar = document.querySelector('#menutop');
        navbar.classList.remove('collapse');
        navbar.classList.remove('p-4');
        navbar.classList.remove('bg-dark');
        navbar.className = 'nav nav-underline nav-fill justify-content-center bg-dark p-2';
    }
}
function mediaDesktop(e) {// On adapte la NAVBAR pour les ordinateurs de bureau (6x par ligne)
    if (e.matches) {
        const navbar = document.querySelector('#menutop');
        navbar.classList.remove('collapse');
        navbar.classList.remove('p-4');
        navbar.classList.remove('bg-dark');
        navbar.className = 'nav nav-underline nav-fill justify-content-center bg-dark p-2';
    }
}
phone.addEventListener("change", mediaPhone);//Quand la fenêtre change de dimensions on appel la fonction qui correspond à la dimensions concerné
tab.addEventListener("change", mediaTab);//Quand la fenêtre change de dimensions on appel la fonction qui correspond à la dimensions concerné
desktop.addEventListener("change", mediaDesktop);//Quand la fenêtre change de dimensions on appel la fonction qui correspond à la dimensions concerné

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
/* Quand la fonction est appelé on affiche la notification créé sur la page PHP */
function drawNotif() {
    const idNotification = document.getElementById('notification');
    const notification = bootstrap.Toast.getOrCreateInstance(idNotification);
    notification.show();
}


