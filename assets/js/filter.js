let mediaMT = window.matchMedia("(max-width: 1023px)");// Pour les dimmensions Mobile et Tablette
let divAccordion = document.getElementById("accordionResp");// Filtres
let spiciesID = document.querySelectorAll('.spicies');
let cards = document.querySelectorAll('.card-pet');
let raceID = document.querySelectorAll('.race');
const pResultNoFound = document.getElementById('result_no_found');

/* Quand la fenêtre a fini de se charger */
window.addEventListener('load', function () {
    drawFilter();
    refreshRaceList();
    pResultNoFound.style.display = "none";
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
        refreshRaceList();
        spieciesChecked();
        refreshList("spicies");
    });
});

/* Quand l'user clique sur une race */
raceID.forEach(race => {
    race.addEventListener('click', (event) => { // On cherche sur quel boutton il a cliqué
        refreshList("race");
    });
});

/* Fonction qui refresh la liste avec les bons filtres */
function refreshList(filterType) {
    pResultNoFound.style.display = "block";
    let resultFound = false;
    cards.forEach(card => {
        if (filterType == "spicies") {
            spiciesID.forEach(spicies => {
                if (spicies.value == card.getAttribute("data-spicies")) {
                    if (spicies.checked == true) {
                        resultFound = true;
                        card.style.cssText = 'display: block !important';
                    }
                    else {
                        card.style.cssText = 'display: none !important';
                    }
                }
            });
        }
        else if (filterType == "race") {
            raceID.forEach(race => {
                if (race.value == card.getAttribute("data-race")) {
                    if (race.checked == true) {
                        resultFound = true;
                        card.style.cssText = 'display: block !important';
                    }
                    else {
                        card.style.cssText = 'display: none !important';
                    }
                }
            });
        }
    });
    if (resultFound == true) {
        pResultNoFound.style.display = "none";
    }
}

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