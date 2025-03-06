<?php
/* Model PHP pour récupérer unuquement les infos de la database et les afficher sur la map */
require_once 'database.php'; // Importation des fonctions de communication avec la BDD
header('Content-Type: application/json');// On signale que la réponse sera du JSON

// Fonction pour récupérer les infos des signalements et les afficher sur la map
function loadMapData(){
    $db = connectToDB("reader");
    $queryText = "SELECT `id_pet`, `lost`, `img_pet`, `lat`, `lon`, `_date`, `_time` FROM path_pets";// On renvoie que quelques informations
    
    try {
        $query = $db -> prepare($queryText);
        $query->execute();
        $dataMap = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $dataMap;
    } catch(PDOException $e) {
        return false;
    }
}

// Le serveur renverra des données au format JSON
$mapData = loadMapData();
if($mapData != false){
    echo json_encode($mapData);
}
?>