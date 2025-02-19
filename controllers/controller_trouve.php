<?php 
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    
    //-- On sélectionne le contenu à afficher en en fonction de si la personne est connecté ou non
    if((isset($_SESSION["connected"]) && $_SESSION["connected"] == 'true') || (isset($_COOKIE["connected"]) && $_COOKIE["connected"] == 'true')){
        require 'views/found.php'; //- Affichage du formulaire pour signaler que l'user a trouvé un animal
    }
    else{
        require 'controllers/controller_compte.php'; // Affichage du formulaire de connexion
    }
?>