<?php
        require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
        require_once 'models/database_users.php'; // Importation des fonctions pour manipuler la bdd users

    //-- On sélectionne le contenu à afficher en en fonction de si la personne est connecté ou non
    if(userConnected() == true){
        require 'views/maccount.php';//- affichage du formulaire pour modifier son compte
    }
    else{
        require 'controllers/controller_index.php'; //- Retour à l'acceuil pour éviter les bugs
    }

?>