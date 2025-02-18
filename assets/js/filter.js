let mediaMT = window.matchMedia("(max-width: 1023px)");// Pour les dimmensions Mobile et Tablette
let divAccordion = document.getElementById("accordionResp");// Filtres
let spiciesID = document.querySelectorAll('.spicies');

/* Quand la fenêtre a fini de se charger */
window.addEventListener('load', function () {
    drawFilter();
    refreshRaceList();
});

/* Quand la fenêtre change de dimmension */
mediaMT.addEventListener("change", function () {
    drawFilter();
});

/* Fonction qui modifie le DOM en fonction de la résolution de l'écran */
function drawFilter() {
    if (window.innerWidth < 1024) {// Version Dekstop
        return document.querySelector('.offcanvas-body').appendChild(divAccordion);
    }
    else {// Version mobile tablette
        return document.querySelector('.filter').appendChild(divAccordion);
    }
}

/* Quand l'user clique sur une espèce */
spiciesID.forEach(spicies => {
    spicies.addEventListener('click', (event) => { // On cherche sur quel boutton il a cliqué
        if (spicies.checked == true) { // On met à jour la liste en vérifiant si le boutton est checké ou non
            drawRace(spicies.id);
        }
        else {
            hideRace(spicies.id);
        }
    });
    spieciesChecked();
});

/* Fonction qui met à jour la liste des races en fonction du boutton espèce checké (Appelé à la fin du chargement du script) */
function refreshRaceList() {
    spiciesID.forEach(spicies => { // On vérifie sur tous les bouttons
        if (spicies.checked == true) { // On met à jour la liste en vérifiant quel bouton est checké ou non
            drawRace(spicies.id);
        }
        else {
            hideRace(spicies.id);
        }
    });
}

/* Fonction qui cache une race */
function hideRace(idSpicies) {
    document.querySelectorAll('.st' + idSpicies).forEach(race => {
        race.style.cssText = 'display: none !important';
    });
    spieciesChecked();
}

/* Fonction qui affiche une race */
function drawRace(idSpicies) {
    document.querySelectorAll('.st' + idSpicies).forEach(race => {
        race.style.cssText = 'display: block !important';
    });
    spieciesChecked();
}

/* Fonction qui vérifie si une espèce est selectionné */
function spieciesChecked() {
    pInfo = document.getElementById("noSpicies");// Message d'info
    pInfo.style.cssText = 'display: block !important';

    spiciesID.forEach(spicies => {
        if (spicies.checked == true) {// Si une espèce est selectionné, on cache le message
            pInfo.style.cssText = 'display: none !important';
        }
    });
}