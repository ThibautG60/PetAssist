/* FICHIER JAVASCRIPT DU SYSTEME DE CARTE INTERACTIVE */
let petMap = null; // On déclare la map

/* Quand la fenêtre a fini de se charger */
window.onload = function () {
    initMap();
};

/* Fonction pour initialiser la map et ses markers */
function initMap() {
    /* Coordonnées de la position par défault de la map */
    const lat = 49.505175;
    const lon = 2.77856;

    petMap = L.map('map').setView([lat, lon], 11);// On créé la map 
    // On récupère la map sur le lien suivant:
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // On cite les sources
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(petMap);

    // On fait une requête au serveur pour récupérer toutes les infos des markers 
    fetch('models/database_map.php')  // Requête vers le fichier PHP
        // On converti la réponse en JSON
        .then(response => {
            if (response.ok) {
                return response.json();
            }
        })
        // On affiche les markers 
        .then(mapData => {
            //On créé une boucle pour chaque ligne du JSON précédement créé grâçe à la requête serveur
            for (data in mapData) {
                // Définition de l'icon " perdu " ainsi que ses dimensions
                const markerLost = L.icon({
                    iconUrl: "assets/img/icons/marker-lost.png",
                    iconSize: [50, 50],
                    iconAnchor: [25, 50],
                    popupAnchor: [-3, -76],
                });

                // Définition de l'icon " trouvé " ainsi que ses dimensions
                const markerFound = L.icon({
                    iconUrl: "assets/img/icons/marker-found.png",
                    iconSize: [50, 50],
                    iconAnchor: [25, 50],
                    popupAnchor: [-3, -76],
                });

                // Si le signalement est une "perte" 
                if (mapData[data].lost == 1) {
                    // Affichage du marker
                    let marker = L.marker([mapData[data].lat, mapData[data].lon], { icon: markerLost }).addTo(petMap);
                    // Création du pop-up qui contient un lien vers le signalement
                    let contentPopup = '<img src="assets/img/pet/' + mapData[data].img_pet + '" class="pop_up_img"> <p class="lost_pop">Animal perdu à cet endroit</p> <hr> <p>Disparu le: ' + mapData[data]._date + ' à ' + mapData[data]._time + '</p> <a href="?p=pet_profil&id=' + mapData[data].id_pet + '">Voir en détail</a>';
                    let popup = L.popup().setContent(contentPopup);
                    marker.bindPopup(popup);
                }
                // Sinon c'est un type "trouvé"
                else {
                    // Affichage du marker
                    let marker = L.marker([mapData[data].lat, mapData[data].lon], { icon: markerFound }).addTo(petMap);
                    // Création du pop-up qui contient un lien vers le signalement
                    let contentPopup = '<img src="assets/img/pet/' + mapData[data].img_pet + '" class="pop_up_img"> <p class="found_pop" >Animal aperçu à cet endroit</p> <hr> <p>Repéré le: ' + mapData[data]._date + ' à ' + mapData[data]._time + '</p>  <a href="?p=pet_profil&id=' + mapData[data].id_pet + '">Voir en détail</a>';
                    let popup = L.popup().setContent(contentPopup);
                    marker.bindPopup(popup);
                }
            }
        })
        // En cas d'érreur, on affiche l'érreur dans la console
        .catch(error => {
            console.error('Erreur:', error);
        });
}