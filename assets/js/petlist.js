window.onload = function () {
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