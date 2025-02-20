const form = document.getElementById('formV');
form.addEventListener('submit', checkForm);
let selectSpicies = document.getElementById('spicies');

/* VERIFICATION DU FORMULAIRE */
function checkForm(e) {
    let valid = true;
    let ariraDetails = document.getElementById('buttonSubmitForm').getAttribute('aria-details');
    form.querySelectorAll('.error-msg').forEach(function (span) {
        span.remove();
    });

    for (let element of form.elements) {
        if (element.classList.contains('form-error')) {
            element.classList.remove('form-error');
        }
        if (!element.validity.valid) {
            element.classList.add('form-error');
            let span = document.createElement('span');
            span.classList.add('error-msg');
            span.textContent = element.validationMessage;
            element.insertAdjacentElement('afterend', span);
            valid = false;
        }
    }
    if (ariraDetails == 'passlost') {
        let pass1 = form.querySelector('#password');
        let pass2 = form.querySelector('#password2');
        if (pass1.value != pass2.value) {
            let span = document.createElement('span');
            span.classList.add('error-msg');
            pass2.classList.add('form-error');
            span.textContent = "Les mots de passes ne correspondent pas";
            pass2.insertAdjacentElement('afterend', span);
            valid = false;
        }
    }
    if (valid == false) {
        e.preventDefault();
    } else {
        switch (ariraDetails) {
            case "create":
                break;
            case "modify":
                alert('modify');
                break;
            case "lost":
                confirm('Vous êtes sûr de vos informations ?');
                break;
            case "found":
                break;
            case "passlost":
                alert('Mot de passe modifié avec succès.');
                location.href = "?p=compte";
                break;
            case "login":
                break;
        }
    }
}

/* CHANGEMENT D'ESPECE DANS LE FORMULAIRE QUI CONCERNE LES ANIMAUX */
/* Quand l'user clique sur une espèce */
selectSpicies.addEventListener('change', (event) => {
    refreshRaceListForm(selectSpicies.value);
});

/* Fonction qui met à jour la liste des races en fonction du boutton espèce selectionné */
function refreshRaceListForm(id) {
    const selectRace = document.getElementById('race');
    for (let i = 0; i < selectRace.children.length; i++) {
        selectRace.children[i].style.cssText = 'display: none !important';
    }

    let spiciesID = document.querySelectorAll('.st' + id);
    spiciesID.forEach(spicies => {
        spicies.style.cssText = 'display: block !important';
    });
    selectRace.value = "";
}