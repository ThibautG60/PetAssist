<?php
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
?>