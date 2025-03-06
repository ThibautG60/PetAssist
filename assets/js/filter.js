const mediaMT = window.matchMedia("(max-width: 1023px)");// Pour les dimmensions Mobile et Tablette
const divAccordion = document.getElementById("accordionResp");// Accordéon des filtres 
const spiciesID = document.querySelectorAll('.spicies');// Espèces disponibles dans le filtre
const raceID = document.querySelectorAll('.race');// Race disponibles dans le filtre
const filterTypes = document.querySelectorAll(".filterType");// Boutton pour choisir le type d'annonce
const cards = document.querySelectorAll('.card-pet');// Cards des signalements
const pResultNoFound = document.getElementById('result_no_found');// Petit texte "Aucun résultat"

/* Quand la fenêtre a fini de se charger */
window.addEventListener('load', function () {
    drawFilter();// On appel la fonction pour afficher les filtres
    refreshRaceList();// On rafraichi la liste des races pour cacher d'office les races car aucun espèce n'est selectionné
    pResultNoFound.style.display = "none";// On cache le texte "aucun résultat"
});

/* Quand la fenêtre change de dimmension */
mediaMT.addEventListener("change", function () {
    drawFilter();// On appel la fonction pour afficher les filtres
});

/* Fonction qui modifie le DOM en fonction de la résolution de l'écran */
function drawFilter() {
    if (window.innerWidth < 1024) {// Version mobile & tablette, les filtres sont contenu dans un offcanvas
        return document.querySelector('.offcanvas-body').appendChild(divAccordion);
    }
    else {// Version Dekstop
        return document.querySelector('.filter').appendChild(divAccordion);
    }
}

/* Quand l'user clique sur une espèce */
spiciesID.forEach(spicies => {
    spicies.addEventListener('click', (event) => { // On cherche sur quel boutton il a cliqué
        if (spicies.checked == true) { // On met à jour la liste en vérifiant si le boutton est checké ou non
            drawRace(spicies.id);// On appel la fonction pour afficher les races en fonction de l'espèce
        }
        else {
            hideRace(spicies.id);// On appel la fonction pour cacher les races en fonction de l'espèce
        }
        spieciesChecked();// On vérifie qu'une espèce soit checké pour afficher ou non le message 'choisissez une espèce'
        refreshList("spicies");// On appel la fonction qui met à jour les cards de signalement
    });
});

/* Quand l'user clique pour un type d'annonce */
filterTypes.forEach(type => {
    type.addEventListener('click', (event) => {
        refreshList(type.value);// On appel la fonction pour mettre à jour les cards des signalements en fonction du type
    });
});

/* Quand l'user clique sur une race */
raceID.forEach(race => {
    race.addEventListener('click', (event) => { // On cherche sur quel boutton il a cliqué
        refreshList("race");// On appel la fonction pour mettre à jour les cards des signalements en fonction de la race
    });
});

/* Fonction qui refresh la liste avec les bons filtres */
function refreshList(filterType) {
    pResultNoFound.style.display = "block";// On affiche le texte 'aucun résultat' d'office
    let resultFound = false;// Variable pour savoir si un résultat a été trouvé ou non
    cards.forEach(card => {
        if (filterType == "spicies") {// Si on veut filtrer par espèce
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
        else if (filterType == "race") {//Si on veut filtrer par race
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
        else if (filterType == "found") { // Si on veut filtrer par signalement et si le type de signalement est ' trouvé '
            if (card.getAttribute("data-type") != 1) {
                resultFound = true;
                card.style.cssText = 'display: block !important';
            }
            else {
                card.style.cssText = 'display: none !important';
            }
        }
        else if (filterType == "lost") { // Si on veut filtrer par signalement et si le type de signalement est ' perdu '
            if (card.getAttribute("data-type") == 1) {
                resultFound = true;
                card.style.cssText = 'display: block !important';
            }
            else {
                card.style.cssText = 'display: none !important';
            }
        }
    });
    if (resultFound == true) { // Si la variable est passé à vrai, alors on cache le texte 'aucun résultat', sinon on le laisse affiché comme fait en amont
        pResultNoFound.style.display = "none";
    }
}

/* Fonction qui met à jour la liste des races en fonction du boutton espèce checké (Appelé à la fin du chargement du script) */
function refreshRaceList() {
    spiciesID.forEach(spicies => { // On vérifie sur tous les bouttons
        if (spicies.checked == true) { // On met à jour la liste en vérifiant quel bouton est checké ou non
            drawRace(spicies.id);// On affiche les races en fonction de l'espèce
        }
        else {
            hideRace(spicies.id);// On cache les races en fonction de l'espèce
        }
    });
}

/* Fonction qui cache une race */
function hideRace(idSpicies) {
    document.querySelectorAll('.st' + idSpicies).forEach(race => {
        race.style.cssText = 'display: none !important';
    });
    spieciesChecked();// On vérifie si une espèce est checké ou non (Pour enlever ou ajouter le message d'info)
}

/* Fonction qui affiche une race */
function drawRace(idSpicies) {
    document.querySelectorAll('.st' + idSpicies).forEach(race => {
        race.style.cssText = 'display: block !important';
    });
    spieciesChecked();// On vérifie si une espèce est checké ou non (Pour enlever ou ajouter le message d'info)
}

/* Fonction qui vérifie si une espèce est selectionné */
function spieciesChecked() {
    pInfo = document.getElementById("noSpicies");// Message d'info 'selectionnez une espèce'
    pInfo.style.cssText = 'display: block !important';

    spiciesID.forEach(spicies => {
        if (spicies.checked == true) {// Si une espèce est selectionné, on cache le message
            pInfo.style.cssText = 'display: none !important';
        }
    });
}