<?php
/* Connexion à la base de données */
function connectToDB($role){
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

/* Récupération de tous les témoignages */
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

/* Fonction pour vérifier l'extension du fichier transmis */
function imgSecure($img, $imgSize){
    $extension = $img['extension'];
    if(($extension == 'JPG' || $extension == 'JPEG' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') && $imgSize <= 56000000){
        return true;
    }
    else{
        return false;
    }
}
?>