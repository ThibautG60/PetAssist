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
?>