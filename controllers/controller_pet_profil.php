<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_users.php'; // Importation des fonctions pour manipuler la bdd users
    require_once 'models/database_pets.php'; // Fonctions qui permettent de manipuler la BDD qui concerne les animaux
    require_once 'templates/notif.php'; // Importation de la fonction des notifications

    $pInfo = getPetInfo($_GET['id']);
    if($pInfo != false)$uInfo = getUserImg($pInfo['id_user']);
    if($pInfo != false)$_SESSION["id_r"] = $uInfo['id_user']; // Variable session pour le système de msg

    if(isset($_GET['r'])){
        if(signalResolved($pInfo['id_pet']) == true){
            notifGenerator('success', 'MISSION ACCOMPLI !', 'Votre animal a été retrouvé.');
            header('Location: ?p=pet_profil&id='.$_GET['id'].'');
        }
    }

    if(isset($_GET['d']) || isset($_GET['m'])){ // Si il y a une requête de modération
        require_once 'controllers/controller_admin.php';//- On appel le controller admin pour gérer sa requête
    }
    else{
        if($pInfo != false){
            include 'views/petprofil.php';//- Affichage de la page profil de l'animal
        }
        else{
            require 'views/static/404.php'; // En cas d'échec de récupération des infos sur l'animal, on affiche la page 404
        }
    }
?>