window.onload = drawData;

async function drawData() {
    const file = await fetch("assets/data/data.json");
    const jData = await file.json();
    const section = document.querySelector('section');
    const bookTop = document.getElementById('booktop');
    const imgBookRight = document.getElementById('imgbookright');

    let divFlex = document.createElement('div');
    divFlex.classList.add('bookflex');
    bookTop.insertBefore(divFlex, imgBookRight);

    for (let i = 0; i < jData.goldenbook.length; i++) {
        let pair = false;
        if (i % 2 == 0) { pair = true; }

        let articleGold = document.createElement('article');
        if (pair == true) { articleGold.classList.add('goldenitem1'); }
        else { articleGold.classList.add('goldenitem2'); }
        if (i == 0 || i == 1) { divFlex.appendChild(articleGold); }
        else { section.appendChild(articleGold); }

        let h3CommentTile = document.createElement('h3');
        articleGold.appendChild(h3CommentTile);
        h3CommentTile.textContent = `${jData["goldenbook"][i]["name"]} et ${jData["goldenbook"][i]["petName"]}`;

        let divItemBody = document.createElement('div');
        divItemBody.classList.add('item-body');
        articleGold.appendChild(divItemBody);

        let aProfilLink = document.createElement('a');
        aProfilLink.classList.add('item-box');
        aProfilLink.href = `accountview.html`;
        aProfilLink.title = "Lien vers le profil";
        if (pair == true) {
            divItemBody.appendChild(aProfilLink);
        }
        let imgProfil = document.createElement('img');
        imgProfil.classList.add('item-img');
        imgProfil.src = `assets/img/profil/${jData["goldenbook"][i]["profilPic"]}`;
        imgProfil.alt = "photo de profil";
        aProfilLink.appendChild(imgProfil);

        let pText = document.createElement('p');
        pText.classList.add('item-text');
        pText.textContent = `${jData["goldenbook"][i]["text"]}`;
        divItemBody.appendChild(pText);

        if (pair == false) {
            divItemBody.appendChild(aProfilLink);
        }

        let aProfilLinkMobile = document.createElement('a');
        aProfilLinkMobile.classList.add('profil-link');
        aProfilLinkMobile.href = `accountview.html`;
        aProfilLinkMobile.textContent = `Profil de ${jData["goldenbook"][i]["name"]}`;
        divItemBody.appendChild(aProfilLinkMobile);

        let divAdmin = document.createElement('div');
        divAdmin.classList.add('icon-admin-box');
        divItemBody.appendChild(divAdmin);
    }
    const script = document.createElement('script');
    script.src = 'assets/js/admin.js';
    document.head.appendChild(script);
}

