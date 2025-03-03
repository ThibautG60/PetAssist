<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_pets.php'; // Fonctions qui permettent de manipuler la BDD qui concerne les animaux
    require_once 'templates/notif.php'; // Importation de la fonction des notifications
    require_once 'controllers/controller_regex.php'; // Importation des fonctions de vérification des formulaires

    if(isset($_POST['filterDate'])){ // Si l'user a utilisé le filtre 'date'
        $petInfo = getAllPetInfo($_POST['filterDate']);
    }
    else if(isset($_POST['filterAdress']) && isset($_POST['filterKM']) && regexLongAdress($_POST['filterAdress']) == true){ // Si l'user a utilisé le filtre 'emplacement'
        $coords = getCoords($_POST['filterAdress']);
        if($coords != false){
            $petInfo = getAllPetInfo(); // On récupère tous les signalements
            $i = 0;

            foreach($petInfo as $pet){ // On analyse tous les signalements et on regarde si ils sont dans le périmètre demandé et on supprime ceux qui n'y sont pas
                if(round(getDistance($coords['lat'], $coords['lon'], $pet['lat'], $pet['lon']) / 1000) > $_POST['filterKM']){
                    unset($petInfo[$i]); // On supprime la ligne dans le tableau
                }
                $i++;
            }
            $petInfo = array_values($petInfo); // On réorganise le tableau
        }
        else{
            notifGenerator('error', 'ERREUR', 'Les filtres n\'ont pas pu être appliqués.');
        }
    }
    else{
        $petInfo = getAllPetInfo();
    }
    
    include_once 'views/petlist.php'; // Affichage de la page de la liste des animaux perdus

?>