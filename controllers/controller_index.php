<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/json_data.php';

    require_once 'models/database_coords.php';

    $coords = getCoords('5 rue d\'en haut', 'Godenvillers', '60420');
    
    if($coords != false){
        echo $coords['lat'];
    }


    require 'views/acceuil.php'; // Affichage de l'acceuil
?>