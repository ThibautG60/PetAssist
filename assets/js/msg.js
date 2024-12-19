const msgDial = document.getElementById('msg-dial');
const msgButton = document.getElementById('msg-button');
const closeMsgButton = document.getElementById('close-msg-button');

msgButton.addEventListener("click", openMsg);
closeMsgButton.addEventListener("click", closeMsg);

function openMsg() {
    msgDial.showModal();
}

function closeMsg() {
    msgDial.close();
}