<?php
/* Fonction pour créer un nouveau signalement */ 
function registerPet($lost, $pet_name, $male, $color, $waist, $age, $puce, $physic, $behaviour, $img, $imgTmp, $adress, $coords, $date, $time, $id_race, $id_user) {
    $db = connectToDB("user");
    $queryText = "INSERT INTO path_pets (`lost`, `pet_name`, `male`, `color`, `waist`, `age`, `puce`, `physic`, `behaviour`, `img_pet`, `adress`, `lat`, `lon`, `_date`, `_time`, `id_race`, `id_user`) 
    VALUES (:lost, :pet_name, :male, :color, :waist, :age, :puce, :physic, :behaviour, :img_pet, :adress, :lat, :lon, :_date, :_time, :id_race, :id_user)";
    try {
        $pet_id = rand(1, 10000000000);
        $fileName =  $pet_id .'.'. $img['extension'];
        move_uploaded_file($imgTmp, "assets/img/pet/" . $fileName);

        // Utilisation de Bind Param pour des questions de sécurité (Injections)
        $query = $db -> prepare($queryText);
        $query -> bindParam(':lost', $lost, PDO::PARAM_INT);
        $query -> bindParam(':pet_name', $pet_name, PDO::PARAM_STR);
        $query -> bindParam(':male', $male, PDO::PARAM_INT);
        $query -> bindParam(':color', $color, PDO::PARAM_STR);
        $query -> bindParam(':waist', $waist, PDO::PARAM_STR);
        $query -> bindParam(':age', $age, PDO::PARAM_INT);
        $query -> bindParam(':puce', $puce, PDO::PARAM_INT);
        $query -> bindParam(':physic', $physic, PDO::PARAM_STR);
        $query -> bindParam(':behaviour', $behaviour, PDO::PARAM_STR);
        $query -> bindParam(':img_pet', $fileName, PDO::PARAM_STR);
        $query -> bindParam(':adress', $adress, PDO::PARAM_STR);
        $query -> bindParam(':lat', $coords['lat'], PDO::PARAM_STR);
        $query -> bindParam(':lon', $coords['lon'], PDO::PARAM_STR);
        $query -> bindParam(':_date', $date, PDO::PARAM_STR);
        $query -> bindParam(':_time', $time, PDO::PARAM_STR);
        $query -> bindParam(':id_race', $id_race, PDO::PARAM_INT);
        $query -> bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $query -> execute();
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors de la création du signalement : " . $e->getMessage();
        return false;
    }
}

/* Récupération de toutes les espèces */
function getAllSpicies(){
    $db = connectToDB("reader");
    $queryText = 'SELECT * FROM path_pet_spicies ORDER BY id_spicies';

    try {
        $query = $db -> prepare($queryText);
        $query -> execute();
        return $query -> fetchAll();
    } catch(PDOException $e) {
        echo "Erreur lors de la génération de la liste des espèces. CODE: " . $e->getMessage();
        return false;
    }
}

/* Récupération de toutes les races */
function getAllRaces(){
    $db = connectToDB("reader");
    $queryText = 'SELECT * FROM path_pet_race ORDER BY id_spicies';

    try {
        $query = $db -> prepare($queryText);
        $query -> execute();
        return $query -> fetchAll();
    } catch(PDOException $e) {
        echo "Erreur lors de la génération de la liste des races. CODE: " . $e->getMessage();
        return false;
    }
}

/* Récupération des données GPS à partir d'une adresse */
function getCoords($adress){
    $url = "https://nominatim.openstreetmap.org/search?format=json&q=" . urlencode($adress);

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