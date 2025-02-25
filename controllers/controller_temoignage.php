<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_users.php'; // Importation des fonctions pour manipuler la bdd users
    require_once 'models/database_pets.php'; // Fonctions qui permettent de manipuler la BDD qui concerne les animaux

    if(isset($_GET['d']) || isset($_GET['m'])){ // Si il y a une requête de modération
        require_once 'controllers/controller_admin.php';//- On appel le controller admin pour gérer sa requête
    }
    else{
        require_once 'views/goldenbook.php';//- Affichage de la page des témoignages
    }
?>