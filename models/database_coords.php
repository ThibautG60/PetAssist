<?php
/* FONCTION POUR OBTENIR LES COORDONNEES GPS D'UNE ADRESSE */
function getCoords($adress, $city, $postal_code){

    $fullAdress = $adress . '+' . $city . '+' . $postal_code;
    $url = "https://nominatim.openstreetmap.org/search?format=json&q=" . urlencode($fullAdress);

    // On utilise CURL pour demander les données à OSM
    $curl = curl_init();

    // On demande à OSM les coordonéées GPS de l'adresse qu'on lui fourni, on demande un retour en format JSON
    curl_setopt($curl, CURLOPT_URL, $url);// On fourni l'url
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);// On demande que la réponse doit être retourné en string plutot que d'être affiché directement
    curl_setopt($curl, CURLOPT_USERAGENT, "Server Pet Assist");// On s'identifie sur le serveur d'OSM

    // On éxécute la requête et on ferme la session
    $result = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($result, true);
    if (isset($data[0])) {
        return $data[0];
    } else {
        return false;
    }
}
?>