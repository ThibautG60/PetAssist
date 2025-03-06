const msgDial = document.getElementById('msg-dial');// On récupère le dialog
const msgButton = document.querySelectorAll('.msg-button');// On récupère les bouttons 'contacter le propriétaire' 
const closeMsgButton = document.getElementById('close-msg-button');// On récupère le boutton pour fermer la boite de dialogues
const formMsg = document.getElementById('formMsg');// On récuypère le formulaire pour envoyer un message
const url = new URLSearchParams(window.location.search);// On vérifie les paramètres passés en GET pour cacher la boite de dialogue ou l'ouvrir au chargement de la page
const page = url.get('p');// On vérifie les paramètres passés en GET pour cacher la boite de dialogue ou l'ouvrir au chargement de la page
let ariaDetails = "openLater";// On cache d'office le dialog, sauf si on passe le paramètre "c" (Comme contact)

// Quand le formulaire pour envoyer un message est soumis
formMsg.addEventListener('submit', addMsg);

/* Boutton pour fermer la boite de dialogue */
closeMsgButton.addEventListener("click", function () {
    if (page == 'compte' && url.get('c') != 0) {
        location.href = "?p=compte";// On recharge la page pour éviter les bugs, seulement sur la page account
    }
    msgDial.close();// On ferme la boite de dialogue
});

/* On cherche sur quel bouton l'user a cliqué, car il se peut qu'il y en ait plusisuers par pages */
msgButton.forEach(button => {
    // Quand l'user click sur le boutton 'contacter le propriétaire'
    button.addEventListener('click', function () {
        msgDial.showModal();// On affiche la boite de dialog
        let msgInput = document.getElementById("msg-input");
        msgInput.focus();// On focus sa vue sur l'input pour écrire son message
    });
});

/* Quand la fenêtre a fini de se charger */
window.addEventListener('load', function () {
    // On vérifie si il faut afficher le dialog tout de suite (Seulement pour la page 'account')
    if (page == 'compte' && url.get('c') != 0) {
        ariaDetails = document.getElementById('msg-dial').getAttribute('aria-details');
    }
    if (ariaDetails === 'openNow') {
        msgDial.showModal();// On affiche la boite de dialog
        let msgInput = document.getElementById("msg-input");
        msgInput.focus();// On focus sa vue sur l'input pour écrire son message
    }
});


/* Fonction pour ajouter le message à l'user */
function addMsg(event) {
    event.preventDefault();// On annule le refresh de la page en cas de submit
    // REGEX pour vérifier les caractères dans les messages (Une deuxième vérification sera faite par le serveur)
    const pattern = new RegExp(/^[A-Za-zÀ-ÿ0-9\sç,;.!?()\@$%^&*-_+|=']{2,}$/, "i");
    let msgInput = document.getElementById("msg-input");

    // Si il y avait une érreur d'afficher en amont on la supprime d'office
    if (msgInput.classList.contains('form-error')) {
        msgInput.classList.remove('form-error');
        msgInput.style.color = "black";
    }

    // Si le message a envoyer est vide on affiche un message d'érreur
    if (msgInput.value == "") {
        msgInput.classList.add('form-error');
        msgInput.style.color = "whitesmoke";
        msgInput.placeholder = "Vous ne pouvez pas envoyer de message vide";
    }

    // Si la vérification est incorrect on affiche un message d'érreur
    else if (pattern.test(msgInput.value) == false) {
        msgInput.classList.add('form-error');
        msgInput.style.color = "whitesmoke";
        msgInput.value = "";
        msgInput.placeholder = "Le message ne doit comporter que des chiffres et des lettres.";
    }

    // Sinon on affiche le message et on appel la fonction pour l'enregistrer dans la database
    else {
        let div = document.createElement('div');
        div.classList.add('msg-text-1');// On ajoute notre message dans la boite de dialogue (Style msg-text-1)
        div.textContent = msgInput.value;
        addMsgDB(msgInput.value);// On appel la fonction pour enregistrer le texte dans la base de données
        formMsg.insertAdjacentElement('beforebegin', div);
        msgInput.value = "";
        msgInput.placeholder = "Ecrivez votre message";
        let msgBack = closeMsgButton.nextElementSibling;
        msgBack.scrollTop = msgBack.scrollHeight;
    }
    msgInput.focus();// On focus sa vue sur l'input pour écrire son message
}

/* Fonction pour envoyer le message au serveur */
function addMsgDB(text) {
    fetch('models/database_msg_register.php', { // On appel ce fichier, et on lui fait passer des valeurs en POST
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'text=' + encodeURIComponent(text),
        credentials: 'same-origin'
    })
}