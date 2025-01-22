const msgDial = document.getElementById('msg-dial');
const msgButton = document.querySelectorAll('.msg-button');
const closeMsgButton = document.getElementById('close-msg-button');
const formMsg = document.getElementById('formMsg');

formMsg.addEventListener('submit', addMsg);

closeMsgButton.addEventListener("click", function () {
    msgDial.close();
});

msgButton.forEach(button => {
    button.addEventListener('click', function () {
        msgDial.showModal();
        let msgInput = document.getElementById("msg-input");
        msgInput.focus();
    });
});

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
        formMsg.insertAdjacentElement('beforebegin', div);
        msgInput.value = "";
        msgInput.placeholder = "Ecrivez votre message";
        let msgBack = closeMsgButton.nextElementSibling;
        msgBack.scrollTop = msgBack.scrollHeight;
    }
    msgInput.focus();
}