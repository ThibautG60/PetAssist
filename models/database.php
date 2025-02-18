<?php
/* Connexion à la base de données */
function connectToDB($role = 'reader'){
    try {
        $options = [PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION];
        $dsn = 'mysql:host=localhost; dbname=pet_assist; charset=utf8';

        if($role == "admin"){
            $dbh = new PDO($dsn, "admin", "path_a_1234/*", $options);// En tant qu'admin
        }
        else if($role == "user"){
            $dbh = new PDO($dsn, "user", "path_u_1234/*", $options);// En tant qu'user 'de base'
        }
        else{
            $dbh = new PDO($dsn, "reader", "path_r_1234/*", $options);// En tant que lecteur uniquement
        }
        return $dbh;
    } 
    catch (PDOException $ex) 
    {
        printf('La connexion à la base de données à échoué. CODE: %s', $ex -> getCode());
        die();
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
?>