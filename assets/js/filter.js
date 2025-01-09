let mediaMT = window.matchMedia("(max-width: 1023px)")
let mediaD = window.matchMedia("(min-width: 1024px)")

mediaMT.addEventListener("change", drawFilter('MT'));
mediaD.addEventListener("change", drawFilter('D'));

function drawFilter(support) {

    let divAccordion = document.createElement('div');
    divAccordion.classList.add('accordion', 'accordion-flush');

    let divAccordionItem = document.createElement('div');
    divAccordionItem.classList.add('accordion-item');
    divAccordion.appendChild(divAccordionItem);

    let divAccordionHeader = document.createElement('h3');
    divAccordionHeader.classList.add('accordion-header');
    divAccordionItem.appendChild(divAccordionHeader);

    let buttonAccordionButton = document.createElement('button');
    buttonAccordionButton.classList.add('accordion-button', 'collapsed', 'filter-item');
    buttonAccordionButton.type = 'button';
    buttonAccordionButton.setAttribute('data-bs-toggle', 'collapse');
    buttonAccordionButton.setAttribute('data-bs-target', '#collapsePetType');
    buttonAccordionButton.setAttribute('aria-expanded', 'false');
    buttonAccordionButton.setAttribute('aria-controls', 'collapsePetType');
    buttonAccordionButton.textContent = 'Espèce';
    divAccordionHeader.appendChild(buttonAccordionButton);

    let divAccordionCollapse = document.createElement('div');
    divAccordionCollapse.classList.add('accordion-collapse', 'collapse');
    divAccordionCollapse.id = 'collapsePetType';
    divAccordionCollapse.setAttribute('data-bs-parent', '#accordion-flush');
    divAccordionItem.appendChild(divAccordionCollapse);

    let divAccordionBody = document.createElement('div');
    divAccordionBody.classList.add('accordion-body');
    divAccordionCollapse.appendChild(divAccordionBody);

    let ulListGroup = document.createElement('ul');
    ulListGroup.classList.add('list-group');
    divAccordionBody.appendChild(ulListGroup);

    let liListGroupItem = document.createElement('li');
    liListGroupItem.classList.add('list-group-item');
    ulListGroup.appendChild(liListGroupItem);

    let inputCheckbox = document.createElement('input');
    inputCheckbox.classList.add('form-check-input', 'me-1');
    inputCheckbox.type = 'checkbox';
    inputCheckbox.value = '';
    inputCheckbox.id = 'filter-dog';
    liListGroupItem.appendChild(inputCheckbox);

    let labelCheckbox = document.createElement('label');
    labelCheckbox.classList.add('form-check-label', 'stretched-link');
    labelCheckbox.htmlFor = 'filter-dog';
    labelCheckbox.textContent = 'Chien';
    liListGroupItem.appendChild(labelCheckbox);

    liListGroupItem = document.createElement('li');
    liListGroupItem.classList.add('list-group-item');
    ulListGroup.appendChild(liListGroupItem);

    inputCheckbox = document.createElement('input');
    inputCheckbox.classList.add('form-check-input', 'me-1');
    inputCheckbox.type = 'checkbox';
    inputCheckbox.value = '';
    inputCheckbox.id = 'filter-cat';
    liListGroupItem.appendChild(inputCheckbox);

    labelCheckbox = document.createElement('label');
    labelCheckbox.classList.add('form-check-label', 'stretched-link');
    labelCheckbox.htmlFor = 'filter-cat';
    labelCheckbox.textContent = 'Chat';
    liListGroupItem.appendChild(labelCheckbox);

    liListGroupItem = document.createElement('li');
    liListGroupItem.classList.add('list-group-item');
    ulListGroup.appendChild(liListGroupItem);

    inputCheckbox = document.createElement('input');
    inputCheckbox.classList.add('form-check-input', 'me-1');
    inputCheckbox.type = 'checkbox';
    inputCheckbox.value = '';
    inputCheckbox.id = 'filter-bird';
    liListGroupItem.appendChild(inputCheckbox);

    labelCheckbox = document.createElement('label');
    labelCheckbox.classList.add('form-check-label', 'stretched-link');
    labelCheckbox.htmlFor = 'filter-bird';
    labelCheckbox.textContent = 'Oiseau';
    liListGroupItem.appendChild(labelCheckbox);

    liListGroupItem = document.createElement('li');
    liListGroupItem.classList.add('list-group-item');
    ulListGroup.appendChild(liListGroupItem);

    inputCheckbox = document.createElement('input');
    inputCheckbox.classList.add('form-check-input', 'me-1');
    inputCheckbox.type = 'checkbox';
    inputCheckbox.value = '';
    inputCheckbox.id = 'filter-rodent';
    liListGroupItem.appendChild(inputCheckbox);

    labelCheckbox = document.createElement('label');
    labelCheckbox.classList.add('form-check-label', 'stretched-link');
    labelCheckbox.htmlFor = 'filter-rodent';
    labelCheckbox.textContent = 'Nouveaux animaux de compagnie';
    liListGroupItem.appendChild(labelCheckbox);

    divAccordionItem = document.createElement('div');
    divAccordionItem.classList.add('accordion-item');
    divAccordion.appendChild(divAccordionItem);

    divAccordionHeader = document.createElement('h3');
    divAccordionHeader.classList.add('accordion-header');
    divAccordionItem.appendChild(divAccordionHeader);

    buttonAccordionButton = document.createElement('button');
    buttonAccordionButton.classList.add('accordion-button', 'collapsed', 'filter-item');
    buttonAccordionButton.type = 'button';
    buttonAccordionButton.setAttribute('data-bs-toggle', 'collapse');
    buttonAccordionButton.setAttribute('data-bs-target', '#collapseMsgTwo');
    buttonAccordionButton.setAttribute('aria-expanded', 'false');
    buttonAccordionButton.setAttribute('aria-controls', 'collapseMsgTwo');
    buttonAccordionButton.textContent = 'Race';
    divAccordionHeader.appendChild(buttonAccordionButton);

    divAccordionCollapse = document.createElement('div');
    divAccordionCollapse.classList.add('accordion-collapse', 'collapse');
    divAccordionCollapse.id = 'collapseMsgTwo';
    divAccordionItem.appendChild(divAccordionCollapse);

    divAccordionBody = document.createElement('div');
    divAccordionBody.classList.add('accordion-body');
    divAccordionCollapse.appendChild(divAccordionBody);

    ulListGroup = document.createElement('ul');
    ulListGroup.classList.add('list-group');
    divAccordionBody.appendChild(ulListGroup);

    let pRaceList = document.createElement('p');
    pRaceList.textContent = 'Selectionnez une race';
    ulListGroup.appendChild(pRaceList);

    divAccordionItem = document.createElement('div');
    divAccordionItem.classList.add('accordion-item');
    divAccordion.appendChild(divAccordionItem);

    divAccordionHeader = document.createElement('h3');
    divAccordionHeader.classList.add('accordion-header');
    divAccordionItem.appendChild(divAccordionHeader);

    buttonAccordionButton = document.createElement('button');
    buttonAccordionButton.classList.add('accordion-button', 'collapsed', 'filter-item');
    buttonAccordionButton.type = 'button';
    buttonAccordionButton.setAttribute('data-bs-toggle', 'collapse');
    buttonAccordionButton.setAttribute('data-bs-target', '#collapseMsgThree');
    buttonAccordionButton.setAttribute('aria-expanded', 'false');
    buttonAccordionButton.setAttribute('aria-controls', 'collapseMsgThree');
    buttonAccordionButton.textContent = 'Trier par emplacement';
    divAccordionHeader.appendChild(buttonAccordionButton);

    divAccordionCollapse = document.createElement('div');
    divAccordionCollapse.classList.add('accordion-collapse', 'collapse');
    divAccordionCollapse.id = 'collapseMsgThree';
    divAccordionItem.appendChild(divAccordionCollapse);

    divAccordionBody = document.createElement('div');
    divAccordionBody.classList.add('accordion-body');
    divAccordionCollapse.appendChild(divAccordionBody);

    let formFilterAdress = document.createElement('form');
    divAccordionBody.appendChild(formFilterAdress);

    let divMarginForm = document.createElement('div');
    divMarginForm.classList.add('mb-3');
    formFilterAdress.appendChild(divMarginForm);

    let labelFilterAdress = document.createElement('label');
    labelFilterAdress.classList.add('form-label');
    labelFilterAdress.htmlFor = 'filter-adress';
    labelFilterAdress.textContent = 'Adresse:';
    divMarginForm.appendChild(labelFilterAdress);

    let inputFilterAdress = document.createElement('input');
    inputFilterAdress.classList.add('form-control');
    inputFilterAdress.type = 'text';
    inputFilterAdress.id = 'filter-adress';
    inputFilterAdress.setAttribute('aria-describedby', 'filter-adressH');
    divMarginForm.appendChild(inputFilterAdress);

    let divFilterAdressH = document.createElement('div');
    divFilterAdressH.classList.add('form-text');
    divFilterAdressH.id = 'filter-adressH';
    divFilterAdressH.textContent = 'Exemple: 8 rue de l\'exemple 60000 EXEMPLE';
    divMarginForm.appendChild(divFilterAdressH);

    let labelFilterKM = document.createElement('label');
    labelFilterKM.htmlFor = 'filter-km';
    labelFilterKM.textContent = 'Rayon autour de l\'adresse:';
    formFilterAdress.appendChild(labelFilterKM);

    let inputFilterKM = document.createElement('input');
    inputFilterKM.type = 'range';
    inputFilterKM.min = '0';
    inputFilterKM.max = '100';
    inputFilterAdress.oninput = `${inputFilterAdress.value}`;
    formFilterAdress.appendChild(inputFilterKM);

    let outputKMFormText = document.createElement('output');
    outputKMFormText.classList.add('form-text');
    outputKMFormText.textContent = 'Rayon de recherche en Kilomètres';
    formFilterAdress.appendChild(outputKMFormText);

    inputFilterKM.addEventListener('input', function () {
        outputKMFormText.textContent = inputFilterKM.value + 'KM';
    });

    divAccordionItem = document.createElement('div');
    divAccordionItem.classList.add('accordion-item');
    divAccordion.appendChild(divAccordionItem);

    divAccordionHeader = document.createElement('h3');
    divAccordionHeader.classList.add('accordion-header');
    divAccordionItem.appendChild(divAccordionHeader);

    buttonAccordionButton = document.createElement('button');
    buttonAccordionButton.classList.add('accordion-button', 'collapsed', 'filter-item');
    buttonAccordionButton.type = 'button';
    buttonAccordionButton.setAttribute('data-bs-toggle', 'collapse');
    buttonAccordionButton.setAttribute('data-bs-target', '#collapseMsgFour');
    buttonAccordionButton.setAttribute('aria-expanded', 'false');
    buttonAccordionButton.setAttribute('aria-controls', 'collapseMsgFour');
    buttonAccordionButton.textContent = 'Trier par date';
    divAccordionHeader.appendChild(buttonAccordionButton);

    divAccordionCollapse = document.createElement('div');
    divAccordionCollapse.classList.add('accordion-collapse', 'collapse');
    divAccordionCollapse.id = 'collapseMsgFour';
    divAccordionItem.appendChild(divAccordionCollapse);

    divAccordionBody = document.createElement('div');
    divAccordionBody.classList.add('accordion-body');
    divAccordionCollapse.appendChild(divAccordionBody);

    ulListGroup = document.createElement('ul');
    ulListGroup.classList.add('list-group');
    divAccordionBody.appendChild(ulListGroup);

    liListGroupItem = document.createElement('li');
    liListGroupItem.classList.add('list-group-item');
    ulListGroup.appendChild(liListGroupItem);

    inputCheckbox = document.createElement('input');
    inputCheckbox.classList.add('form-check-input', 'me-1');
    inputCheckbox.type = 'radio';
    inputCheckbox.value = '';
    inputCheckbox.id = 'filter-date-asc';
    inputCheckbox.name = 'listGroupRadio';
    liListGroupItem.appendChild(inputCheckbox);

    labelCheckbox = document.createElement('label');
    labelCheckbox.classList.add('form-check-label');
    labelCheckbox.htmlFor = 'filter-date-asc';
    labelCheckbox.textContent = 'Date croissante';
    liListGroupItem.appendChild(labelCheckbox);

    liListGroupItem = document.createElement('li');
    liListGroupItem.classList.add('list-group-item');
    ulListGroup.appendChild(liListGroupItem);

    inputCheckbox = document.createElement('input');
    inputCheckbox.classList.add('form-check-input', 'me-1');
    inputCheckbox.type = 'radio';
    inputCheckbox.value = '';
    inputCheckbox.id = 'filter-date-desc';
    inputCheckbox.name = 'listGroupRadio';
    liListGroupItem.appendChild(inputCheckbox);

    labelCheckbox = document.createElement('label');
    labelCheckbox.classList.add('form-check-label');
    labelCheckbox.htmlFor = 'filter-date-desc';
    labelCheckbox.textContent = 'Date décroissante';
    liListGroupItem.appendChild(labelCheckbox);

    if (support == 'D') {
        document.querySelector('.filter').appendChild(divAccordion);
    }
    else {
        document.querySelector('.offcanvas-body').appendChild(divAccordion);
    }
}