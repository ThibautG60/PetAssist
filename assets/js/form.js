const form = document.getElementById('formV');// Les différents formulaires présents sur le site
const selectSpicies = document.getElementById('spicies');// Le champ 'espèce' des formulaires
form.addEventListener('submit', checkForm);// Quand le formulaire est soumis


/* VERIFICATION DU FORMULAIRE */
function checkForm(e) {
    let valid = true;// Bolléen pour savoir si un formulaire est valide ou non
    let ariraDetails = document.getElementById('buttonSubmitForm').getAttribute('aria-details');// On regarde si le formulaire est un formulaire de modification ou de création
    form.querySelectorAll('.error-msg').forEach(function (span) {
        span.remove();// On supprime tous les messages d'érreurs si ils existent 
    });

    // On vérifie tous les champs du formulaire
    for (let element of form.elements) {
        // Si un champs contient la classe form-error on l'enlève d'office
        if (element.classList.contains('form-error')) {
            element.classList.remove('form-error');
        }
        //Si le champs est invalide on lui met la classe form-error + le message d'érreur
        if (!element.validity.valid) {
            element.classList.add('form-error');
            let span = document.createElement('span');
            span.classList.add('error-msg');
            span.textContent = element.validationMessage;
            element.insertAdjacentElement('afterend', span);
            valid = false;// On déclare que le formulaire est invalide
        }
    }

    //Si le formulaire est invalide on empêche le refresh de la page
    if (valid == false) {
        e.preventDefault();
    } else {
        // Si c'est un formulaire de modification, on demande confirmation à l'user avant de modifier dans la base de données
        if (ariraDetails == "modify") {
            if (confirm("Confirmez-vous les informations ?") == false) {
                e.preventDefault();
            }
        }
    }
}

/* CHANGEMENT D'ESPECE DANS LE FORMULAIRE QUI CONCERNE LES ANIMAUX */
/* Quand l'user clique sur une espèce */
selectSpicies.addEventListener('change', (event) => {
    refreshRaceListForm(selectSpicies.value);// On met à jour les races en fonction des espèces
});

/* Fonction qui met à jour la liste des races en fonction du boutton espèce selectionné */
function refreshRaceListForm(id) {
    const selectRace = document.getElementById('race');
    for (let i = 0; i < selectRace.children.length; i++) {// On cache toutes les races d'office (Donc les enfant du champ race)
        selectRace.children[i].style.cssText = 'display: none !important';
    }

    let spiciesID = document.querySelectorAll('.st' + id);// On affiche que les races en fonction de l'id espèce
    spiciesID.forEach(spicies => {
        spicies.style.cssText = 'display: block !important';
    });
    selectRace.value = "";// On met le champs vide pour éviter que le forulaire soit soumis avec une mauvaise race
}