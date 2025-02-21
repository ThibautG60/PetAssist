let lat = 49.505175;
let lon = 2.77856;
let petMap = null;

function initMap() {

    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    petMap = L.map('map').setView([lat, lon], 11);
    // On récupère la map sur le lien suivant:
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // On cite les sources
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(petMap);

    fetch('models/database_map.php')  // Requête vers le fichier PHP
        .then(response => {
            if (response.ok) {
                return response.json();  // On convertit la réponse en JSON
            }
        })
        .then(mapData => {
            for (reporting in mapData) {
                let markerLost = L.icon({ // Définition de l'icon " perdu " ainsi que ses dimmenssions
                    iconUrl: "assets/img/icons/marker-lost.png",
                    iconSize: [50, 50],
                    iconAnchor: [25, 50],
                    popupAnchor: [-3, -76],
                });
                let markerFound = L.icon({ // Définition de l'icon " trouvé " ainsi que ses dimmenssions
                    iconUrl: "assets/img/icons/marker-found.png",
                    iconSize: [50, 50],
                    iconAnchor: [25, 50],
                    popupAnchor: [-3, -76],
                });


                if (mapData[reporting].lost == 1) {// Si le signalement est une "perte" 
                    let marker = L.marker([mapData[reporting].lat, mapData[reporting].lon], { icon: markerLost }).addTo(petMap);
                    let contentPopup = '<img src="assets/img/pet/' + mapData[reporting].img_pet + '" class="pop_up_img"> <p class="lost_pop">Animal perdu à cet endroit</p> <hr> <p>Disparu le: ' + mapData[reporting]._date + ' à ' + mapData[reporting]._time + '</p> <a href="?p=pet_profil&id=' + mapData[reporting].id_pet + '">Voir en détail</a>';
                    let popup = L.popup().setContent(contentPopup);
                    marker.bindPopup(popup);
                }
                else { // Sinon c'est un type "trouvé"
                    let marker = L.marker([mapData[reporting].lat, mapData[reporting].lon], { icon: markerFound }).addTo(petMap);
                    let contentPopup = '<img src="assets/img/pet/' + mapData[reporting].img_pet + '" class="pop_up_img"> <p class="found_pop" >Animal aperçu à cet endroit</p> <hr> <p>Repéré le: ' + mapData[reporting]._date + ' à ' + mapData[reporting]._time + '</p>  <a href="?p=pet_profil&id=' + mapData[reporting].id_pet + '">Voir en détail</a>';
                    let popup = L.popup().setContent(contentPopup);
                    marker.bindPopup(popup);
                }
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
}

window.onload = function () {
    initMap();
};