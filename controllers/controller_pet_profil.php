<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_users.php'; // Importation des fonctions pour manipuler la bdd users
    require_once 'models/database_pets.php'; // Fonctions qui permettent de manipuler la BDD qui concerne les animaux
    
    $pInfo = getPetInfo();
    if($pInfo != false){
        include 'views/petprofil.php';//- Affichage de la page profil de l'animal
    }
    else{
        require 'views/static/404.php'; // En cas d'échec de récupération des infos sur l'animal, on affiche la page 404
    }
?>