const iconAdminBox = document.querySelectorAll('.icon-admin-box');
showAdminIcon();

function showAdminIcon() {
    let id = 1;

    iconAdminBox.forEach(eAdminBox => {
        let btnM = document.createElement("button");
        btnM.id = "modify" + id;
        let btnD = document.createElement("button");
        btnD.id = "delete" + id;
        let imgModify = document.createElement("img");
        let imgDelete = document.createElement("img");
        imgModify.src = "assets/img/icons/modify.png";
        imgDelete.src = "assets/img/icons/delete.png";
        imgModify.classList.add('icon-admin');
        imgDelete.classList.add('icon-admin');
        btnM.classList.add('btn-admin');
        btnD.classList.add('btn-admin');
        imgModify.setAttribute("alt", "Icone administrateur");
        imgDelete.setAttribute("alt", "Icone administrateur");
        eAdminBox.appendChild(btnM);
        eAdminBox.appendChild(btnD);
        btnM.appendChild(imgModify);
        btnD.appendChild(imgDelete);
        id++;
    });
}

iconAdminBox.forEach(eAdminBox => {
    eAdminBox.addEventListener('click', function (event) {
        if (event.target.closest('.btn-admin')) {
            const id = event.target.closest('.btn-admin').id;
            if (id.startsWith('modify')) {
                if (location.href.includes('goldenbook.html')) {
                    let elementMod = eAdminBox.closest('article');
                    const newText = prompt("Modifiez le texte de ce post");
                    if (newText !== null) {
                        elementMod.querySelector('.item-text').textContent = newText;
                    }
                }
                if (location.href.includes('accountview.html')) {
                    const fmodifyDial = document.getElementById('fmodify-dial');
                    const inputPseudo = document.getElementById('pseudo');
                    inputPseudo.value = "Valeur actuelle";
                    fmodifyDial.showModal();
                }
                if (location.href.includes('petprofil.html')) {
                    const fmodifyDial = document.getElementById('fmodify-dial');
                    const inputPetName = document.getElementById('pet-name');
                    inputPetName.value = "Valeur actuelle";
                    const inputPetRace = document.getElementById('pet-race');
                    inputPetRace.value = "Valeur actuelle";
                    const inputPetColor = document.getElementById('pet-color');
                    inputPetColor.value = "Valeur actuelle";
                    const inputPetWaist = document.getElementById('pet-waist');
                    inputPetWaist.value = "Valeur actuelle";
                    const inputPetWeight = document.getElementById('pet-weight');
                    inputPetWeight.value = "0";
                    const inputPetAge = document.getElementById('pet-age');
                    inputPetAge.value = "0";
                    const inputPetPuce = document.getElementById('pet-puce');
                    inputPetPuce.value = "0";
                    const inputPetPhysic = document.getElementById('pet-physic');
                    inputPetPhysic.value = "Valeur actuelle";
                    const inputPetComport = document.getElementById('pet-comport');
                    inputPetComport.value = "Valeur actuelle";
                    const inputPetAdress = document.getElementById('pet-adress');
                    inputPetAdress.value = "Valeur actuelle";
                    const inputPetDate = document.getElementById('pet-date');
                    inputPetDate.value = "2000-01-01";
                    const inputPetTime = document.getElementById('pet-time');
                    inputPetTime.value = "00:00";
                    fmodifyDial.showModal();
                }
            }
            else if (id.startsWith('delete')) {
                if (location.href.includes('goldenbook.html')) {
                    if (confirm("Etes-vous sûr de vouloir supprimer ce post ?")) {
                        let elementDel = eAdminBox.closest('article');
                        elementDel.remove();
                    }
                }
                if (location.href.includes('accountview.html')) {
                    if (confirm("Etes-vous sûr de vouloir supprimer ce profil ?")) {
                        alert('Profil supprimé');
                    }
                }
                if (location.href.includes('petprofil.html')) {
                    if (confirm("Etes-vous sûr de vouloir supprimer ce profil ?")) {
                        alert('Profil supprimé');
                    }
                }
            }
        }
    });
});

if (location.href.includes('accountview.html') || location.href.includes('petprofil.html')) {
    const closefmodifyButton = document.getElementById('close-fmodify-button');
    closefmodifyButton.addEventListener("click", function () {
        const fmodifyDial = document.getElementById('fmodify-dial');
        fmodifyDial.close();
    });
}