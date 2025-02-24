const msgDial = document.getElementById('msg-dial');
const msgButton = document.querySelectorAll('.msg-button');
const closeMsgButton = document.getElementById('close-msg-button');
const formMsg = document.getElementById('formMsg');

let ariaDetails = document.getElementById('msg-dial').getAttribute('aria-details');

formMsg.addEventListener('submit', addMsg);

/* Boutton pour fermer la boite de dialogue */
closeMsgButton.addEventListener("click", function () {
    msgDial.close();
    location.href = "?p=compte";
});

/* On cherche sur quel bouton l'user a cliqué, car il se peut qu'il y en ait plusisuers par pages */
msgButton.forEach(button => {
    button.addEventListener('click', function () {
        msgDial.showModal();
        let msgInput = document.getElementById("msg-input");
        msgInput.focus();
    });
});

/* Quand la fenêtre a fini de se charger */
window.addEventListener('load', function () {
    if (ariaDetails == 'openNow') { // On vérifie si il faut afficher le dialog tout de suite (Onglet ' mon compte')
        msgDial.showModal();
        let msgInput = document.getElementById("msg-input");
        msgInput.focus();
    }
});


/* Fonction pour ajouter le message à l'user */
function addMsg(event) {
    event.preventDefault();
    let msgInput = document.getElementById("msg-input");
    if (msgInput.classList.contains('form-error')) {
        msgInput.classList.remove('form-error');
    }
    if (msgInput.value == "") {
        msgInput.classList.add('form-error');
        msgInput.placeholder = "Vous ne pouvez pas envoyer de message vide";
    }
    else {
        let div = document.createElement('div');
        div.classList.add('msg-text-1');
        div.textContent = msgInput.value;
        addMsgDB(msgInput.value);
        formMsg.insertAdjacentElement('beforebegin', div);
        msgInput.value = "";
        msgInput.placeholder = "Ecrivez votre message";
        let msgBack = closeMsgButton.nextElementSibling;
        msgBack.scrollTop = msgBack.scrollHeight;
    }
    msgInput.focus();
}

/* Fonction pour envoyer le message au serveur */
function addMsgDB(text) {
    fetch('models/database_msg_register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'text=' + encodeURIComponent(text),
        credentials: 'same-origin'
    })
}