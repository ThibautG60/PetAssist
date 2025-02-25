<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_users.php'; // Importation des fonctions pour manipuler la bdd users
    require_once 'models/database_pets.php'; // Fonctions qui permettent de manipuler la BDD qui concerne les animaux
    
    $uInfo = getUserInfo($_GET['id']);
    if($uInfo != false)$_SESSION["id_r"] = $uInfo['id_user']; // Variable session pour le système de msg

    if(isset($_GET['d']) || isset($_GET['m'])){ // Si il y a une requête de modération
        require_once 'controllers/controller_admin.php';//- On appel le controller admin pour gérer sa requête
    }
    else{
        if($uInfo != false){
            include 'views/accountview.php'; // Affichage du compte d'un utilisateur tiers
        }
        else{
            require 'views/static/404.php'; // En cas d'échec de récupération des infos sur l'animal, on affiche la page 404
        }
    }
?>