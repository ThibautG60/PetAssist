<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_pets.php'; // Fonctions qui permettent de manipuler la BDD qui concerne les animaux
    require_once 'templates/notif.php'; // Importation de la fonction des notifications

    if(isset($_POST['filterDate'])){
        $petInfo = getAllPetInfo($_POST['filterDate']);
    }
    else if(isset($_POST['filterAdress']) && isset($_POST['filterKM'])){
        $coords = getCoords($_POST['filterAdress']);
        if($coords != false){
            $petInfo = getAllPetInfo();
            $i = 0;

            foreach($petInfo as $pet){
                echo round(getDistance($coords['lat'], $coords['lon'], $pet['lat'], $pet['lon']) / 1000, 3);
                echo $_POST['filterKM'];
                if(round(getDistance($coords['lat'], $coords['lon'], $pet['lat'], $pet['lon']) / 1000) > $_POST['filterKM']){
                    unset($petInfo[$i]);
                }
                $i++;
            }
            $petInfo = array_values($petInfo);
        }
        else{
            notifGenerator('error', 'ERREUR', 'Les filtres n\'ont pas pu être appliqués.');
        }
    }
    else{
        $petInfo = getAllPetInfo();
    }

    /* (Fonction by forty (https://phpsources.net/code_s.php?id=459)) */
    // renvoi la distance en mètres 
    function getDistance($lat1, $lng1, $lat2, $lng2) {
        $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
        $rlo1 = deg2rad($lng1);
        $rla1 = deg2rad($lat1);
        $rlo2 = deg2rad($lng2);
        $rla2 = deg2rad($lat2);
        $dlo = ($rlo2 - $rlo1) / 2;
        $dla = ($rla2 - $rla1) / 2;
        $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
        $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return ($earth_radius * $d);
    }

      include_once 'views/petlist.php'; // Affichage de la page de la liste des animaux perdus

?>