<?php
/* Model PHP pour toutes les fonctions en rapport avec la base de données des signalements */ 

/**
 * Fonction pour enregistrer un nouveau signalement dans la base de données
 * @return bool true: Si le changement a bien été effectué sinon false
 */
function registerPet($lost, $pet_name, $male, $color, $waist, $age, $puce, $physic, $behaviour, $img, $imgTmp, $adress, $coords, $date, $time, $id_race, $id_spicies, $id_user) {
    $db = connectToDB("user");
    $queryText = "INSERT INTO path_pets (`lost`, `pet_name`, `male`, `color`, `waist`, `age`, `puce`, `physic`, `behaviour`, `img_pet`, `adress`, `lat`, `lon`, `_date`, `_time`, `id_race`, `id_spicies`, `id_user`) 
    VALUES (:lost, :pet_name, :male, :color, :waist, :age, :puce, :physic, :behaviour, :img_pet, :adress, :lat, :lon, :_date, :_time, :id_race, :id_spicies, :id_user)";
    try {
        // Système de fichiers
        $img_id = rand(1, 10000000000);// Le nouveau nom du fichier sera un nombre random
        $fileName =  $img_id .'.'. $img['extension']; // On ajoute l'extension

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
        $query -> bindParam(':id_spicies', $id_spicies, PDO::PARAM_INT);
        $query -> bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $query -> execute();
        move_uploaded_file($imgTmp, "assets/img/pet/" . $fileName);
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors de la création du signalement : " . $e->getMessage();
        return false;
    }
}

/**
 * Fonction pour récuperer toute la base de données des signalements
 * @param int $order ordre de récupération (plus grand au petit ou inversement)
 * @return bool|array retourne un tableau qui contient toutes les infos sur tous les signalements
 */
function getAllPetInfo($order = "none"){
    $db = connectToDB("reader");
    if($order == 'up')$queryText = "SELECT * FROM path_pets ORDER BY `_date`"; // On récupère tous les signalements, du plus vieux au plus récent
    else $queryText = "SELECT * FROM path_pets ORDER BY `_date` DESC"; // On récupère tous les signalements, du plus récent au plus vieux

    try {
        $query = $db -> prepare($queryText);
        $query -> execute();
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération des données de la liste des animaux. CODE: " . $e->getMessage();
        return false;
    }
}

/**
 * Fonction pour récuperer toute les infos sur un signalement en particulier
 * @param int $id ID du signalement
 * @return bool|array retourne un tableau qui contient toutes les infos sur le signalement
 */
function getPetInfo($id){
    $db = connectToDB("reader");
    $queryText = "SELECT * FROM path_pets WHERE `id_pet` = :id_pet";// On récupère toutes les informations

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_pet', $id);
        $query -> execute();
        $result = $query -> fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération des données d'un animal. CODE: " . $e->getMessage();
        return false;
    }
}

/**
 * Fonction pour récuperer toute les infos sur les signalements d'un user en particulier
 * @param int $id_user ID de l'user
 * @return bool|array retourne un tableau qui contient toutes les infos sur les signalements de l'user
 */
function getUserPetInfo($id_user){
    $db = connectToDB("reader");
    $queryText = "SELECT * FROM path_pets WHERE `id_user` = :id_user";// On récupère toutes les informations

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_user', $id_user);
        $query -> execute();
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération des données des animaux d'un utilisateur. CODE: " . $e->getMessage();
        return false;
    }
}

/**
 * Fonction pour récuperer toute les noms d'espèces et leur ID
 * @return bool|array retourne un tableau qui contient tous les noms d'espèces et leur ID
 */
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

/**
 * Fonction pour récuperer le nom d'une espèce à partir de son ID
 * @param int $id_spicies ID de l'espèce
 * @return bool|array retourne un tableau qui contient le nom de l'espèce
 */
function getSpiciesName($id_spicies){
    $db = connectToDB("reader");
    $queryText = 'SELECT `spicies` FROM path_pet_spicies WHERE `id_spicies` = :id_spicies';

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_spicies', $id_spicies);
        $query -> execute();
        $result = $query -> fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e) {
        echo "Erreur lors de la génération du nom d'une espèce. CODE: " . $e->getMessage();
        return false;
    }
}

/**
 * Fonction pour récuperer toute les noms des races et leur ID
 * @return bool|array retourne un tableau qui contient tous les noms des races et leur ID
 */
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

/**
 * Fonction pour récuperer le nom d'une race à partir de son ID
 * @param int $id_race ID de la race
 * @return bool|array retourne un tableau qui contient le nom de la race
 */
function getRaceName($id_race){
    $db = connectToDB("reader");
    $queryText = 'SELECT `race` FROM path_pet_race WHERE `id_race` = :id_race';

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_race', $id_race);
        $query -> execute();
        $result = $query -> fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e) {
        echo "Erreur lors de la génération du nom d'une espèce. CODE: " . $e->getMessage();
        return false;
    }
}

/**
 * Fonction pour changer le status d'un signalement
 * @param int $id_pet ID du signalement
 * @return bool retourne true si le changement a eu lieu, sinon false
 */
function signalResolved($id_pet){
    $db = connectToDB("user");
    $queryText = "UPDATE `path_pets` SET `resolved` = 1 WHERE `id_pet` = :id_pet";

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_pet', $id_pet);
        $query -> execute();
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors du changement de status d'un signalement. CODE: " . $e->getMessage();
        return false;
    }
}

/**
 * Fonction pour récupérer tous les témoignages
 * @return bool|array retourne un tableau qui contient tous les témoignages, sinon on retourne false
 */
function getAllTestimony(){
    $db = connectToDB("reader");
    $queryText = "SELECT * FROM path_pets WHERE `testimony_text` IS NOT NULL";// On récupère tous les témoignages

    try {
        $query = $db -> prepare($queryText);
        $query -> execute();
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération des données des témoignages. CODE: " . $e->getMessage();
        return false;
    }
}

/**
 * Fonction pour changer supprimer un témoignage
 * @param int $id_pet ID du signalement
 * @return bool retourne true si le changement a eu lieu, sinon false
 */
function deleteTestimony($id_pet){
    $db = connectToDB("user");
    $queryText = "UPDATE `path_pets` SET `testimony_text` = NULL WHERE `id_pet` = :id_pet";

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_pet', $id_pet);
        $query -> execute();
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors de la suppression d'un témoignage. CODE: " . $e->getMessage();
        return false;
    }
}

/**
 * Fonction pour modifier un témoignage
 * @param int $id_pet ID du signalement
 * @param string $content texte du témoignage
 * @return bool retourne true si le changement a eu lieu, sinon false
 */
function ModifyPetTestimony($id_pet, $content){
    $db = connectToDB("user");
    $queryText = "UPDATE `path_pets` SET `testimony_text` = :content WHERE `id_pet` = :id_pet";

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_pet', $id_pet);
        $query -> bindParam(':content', $content, PDO::PARAM_STR);
        $query -> execute();
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors de la modification d'un témoignage. CODE: " . $e->getMessage();
        return false;
    }
}

/**
 * Fonction pour changer supprimer un signalement
 * @param int $id_pet ID du signalement
 * @return bool retourne true si le changement a eu lieu, sinon false
 */
function deletePetProfil($id_pet){
    $db = connectToDB("admin");
    $queryText = "DELETE FROM `path_pets` WHERE `id_pet` = :id_pet";

    try {
        /* Suppression de l'image */
        $oldImg = getPetInfo($id_pet)['img_pet'];
        if(file_exists("assets/img/pet/" . $oldImg)) unlink("assets/img/pet/" . $oldImg);
        /* Execution de la requête */
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_pet', $id_pet);
        $query -> execute();
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors de la suppression d'un profil animal. CODE: " . $e->getMessage();
        return false;
    }
}

/**
 * Fonction pour modifier un signalement
 * @return bool retourne true si le changement a eu lieu, sinon false
 */
function ModifyPetProfil($id_pet, $pet_name, $color, $waist, $age, $puce, $physic, $behaviour, $adress, $_date, $_time, $img, $imgTmp, $coords){
    $db = connectToDB("user");

    if($img == 0)$queryText = "UPDATE `path_pets` SET `pet_name` = :pet_name, `color` = :color, `waist` = :waist, `age` = :age, `puce` = :puce, `physic` = :physic, `behaviour` = :behaviour, `adress` = :adress, `_date` = :_date, `_time` = :_time, `lat` = :lat, `lon` = :lon WHERE `id_pet` = :id_pet";
    else $queryText = "UPDATE `path_pets` SET `pet_name` = :pet_name, `color` = :color, `waist` = :waist, `age` = :age, `puce` = :puce, `physic` = :physic, `behaviour` = :behaviour, `adress` = :adress, `_date` = :_date, `_time` = :_time, `img_pet` = :img_pet, `lat` = :lat, `lon` = :lon WHERE `id_pet` = :id_pet";

    try {
        if($img != 0){
            /* Génération du nouveau fichier */
            $img_id = rand(1, 10000000000);
            $fileName =  $img_id .'.'. $img['extension'];
        }

        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_pet', $id_pet);
        $query -> bindParam(':pet_name', $pet_name, PDO::PARAM_STR);
        $query -> bindParam(':color', $color, PDO::PARAM_STR);
        $query -> bindParam(':waist', $waist, PDO::PARAM_STR);
        $query -> bindParam(':age', $age, PDO::PARAM_INT);
        $query -> bindParam(':puce', $puce, PDO::PARAM_INT);
        $query -> bindParam(':physic', $physic, PDO::PARAM_STR);
        $query -> bindParam(':behaviour', $behaviour, PDO::PARAM_STR);
        $query -> bindParam(':adress', $adress, PDO::PARAM_STR);
        $query -> bindParam(':_date', $_date, PDO::PARAM_STR);
        $query -> bindParam(':_time', $_time, PDO::PARAM_STR);
        if($img != 0)$query -> bindParam(':img_pet', $fileName, PDO::PARAM_STR);
        $query -> bindParam(':lat', $coords['lat'], PDO::PARAM_STR);
        $query -> bindParam(':lon', $coords['lon'], PDO::PARAM_STR);
        $query -> execute();
        if($img != 0){
            /* Suppression de l'ancien fichier */
            $oldImg = getPetInfo($id_pet)['img_pet'];
            if(file_exists("assets/img/pet/" . $oldImg)) unlink("assets/img/pet/" . $oldImg);
            move_uploaded_file($imgTmp, "assets/img/pet/" . $fileName);
        }
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors de la modification d'un profil animal. CODE: " . $e->getMessage();
        return false;
    }
}

/**
 * Fonction récupéré les données GPS à partir d'une adresse
 * @param string $adress l'adresse à localiser sur une carte
 * @return bool|array retourne un tableau en JSON avec la lattitude et la longitude
 */
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

/**
 * Fonction calculer la distance entre deux coordonées GPS (Fonction by forty (https://phpsources.net/code_s.php?id=459))
 * @param float $lat1 lattitude de l'adresse 1
 * @param float $lng1 longitude de l'adresse 1
 * @param float $lat2 lattitude de l'adresse 2
 * @param float $lng2 longitude de l'adresse 2
 * @return float retourne une distance en mètre
 */
function getDistance($lat1, $lng1, $lat2, $lng2) {
    $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
    $rlo1 = deg2rad($lng1);
    $rla1 = deg2rad($lat1);
    $rlo2 = deg2rad($lng2);
    $rla2 = deg2rad($lat2);
    $dlo = ($rlo2 - $rlo1) / 2;
    $dla = ($rla2 - $rla1) / 2;
    $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
    $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
    return ($earth_radius * $d);
}
?>