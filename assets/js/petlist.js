const pageAdress = location.href;

if (pageAdress.includes("petlist.html")) {
    drawList();
}
else { lineType(); }

async function drawList() {
    const file = await fetch("assets/data/data.json");
    const jData = await file.json();
    const list = document.querySelector('.list');

    for (let i = 0; i < jData.petlist.length; i++) {

        let divCardPet = document.createElement('div');
        divCardPet.classList.add('card-pet');
        divCardPet.dataset.type = jData["petlist"][i]["signalType"];
        list.appendChild(divCardPet);

        let aPetLink = document.createElement('a');
        aPetLink.classList.add('item-box');
        aPetLink.href = `petprofil.html`;
        aPetLink.title = "Profil de l'animal";
        divCardPet.appendChild(aPetLink);

        let imgPet = document.createElement('img');
        imgPet.classList.add('img-pet');
        imgPet.src = `assets/img/pet/${jData["petlist"][i]["petImg"]}`;
        imgPet.alt = "photo de l'animal";
        aPetLink.appendChild(imgPet);

        let divCardBody = document.createElement('div');
        divCardBody.classList.add('card-body');
        divCardPet.appendChild(divCardBody);

        let pCardTitle = document.createElement('p');
        pCardTitle.classList.add('card-title');
        pCardTitle.textContent = jData["petlist"][i]["petName"];
        divCardBody.appendChild(pCardTitle);

        let pCardInfo = document.createElement('p');
        pCardInfo.classList.add('card-text');
        pCardInfo.innerHTML = `Espèce: ${jData["petlist"][i]["petSpicies"]}<br>Race: ${jData["petlist"][i]["petRace"]}<br>Lieu: ${jData["petlist"][i]["petAdress"]}<br>Date: ${jData["petlist"][i]["petDate"]}`;
        divCardBody.appendChild(pCardInfo);
    }
    lineType();
}

function lineType() {
    const cardList = document.getElementsByClassName('card-pet');
    //- Box shadow + separateur des miniatures dans la liste
    for (card of cardList) {
        let div = document.createElement('div');

        if (card.dataset.type == 'found') {
            div.className = "line-found";
            card.style.boxShadow = "2px 1px 7px #198754";
        }
        else {
            div.className = "line-lost";
            card.style.boxShadow = "2px 1px 7px #dc3545"
        }
        card.lastElementChild.lastElementChild.insertAdjacentElement('beforebegin', div);
    }
};


