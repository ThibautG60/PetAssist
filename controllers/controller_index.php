<?php
    require 'models/database.php';
    require 'models/json_data.php';
    require 'views/acceuil.php'; // Affichage de l'acceuil

    //Créer un instance de la base de données.
    $db = connectToDB("reader");
    //exécute larequête
    $postsStmt = $db -> query('SELECT * FROM path_pet_race');
    //Récupèrele jeude données
    $posts = $postsStmt -> fetchAll();

    foreach($posts as $data){
        echo $data['race'] . '<br>';
    }
?>