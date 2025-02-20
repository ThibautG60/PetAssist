<?php
require_once 'database.php'; // Importation des fonctions de communication avec la BDD
header('Content-Type: application/json');// On signale que la réponse sera du JSON

// On récupère toutes les infos de la DB des animaux
function loadMapData(){
    $db = connectToDB("user");
    $queryText = "SELECT `id_pet`, `lost`, `img_pet`, `lat`, `lon` FROM path_pets";// On renvoie que quelques informations
    
    try {
        $query = $db -> prepare($queryText);
        $query->execute();
        $dataMap = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $dataMap;
    } catch(PDOException $e) {
        return false;
    }
}

// On encore en JSON comme prévu
$mapData = loadMapData();
if($mapData != false){
    echo json_encode($mapData);
}
?>