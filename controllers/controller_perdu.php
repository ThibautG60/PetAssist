<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_users.php'; // Importation des fonctions pour manipuler la bdd users
    require_once 'models/database_pets.php'; // Fonctions qui permettent de manipuler la BDD qui concerne les animaux
    require_once 'templates/notif.php'; // Importation de la fonction des notifications
    require_once 'controllers/controller_regex.php'; // Importation des fonctions de vérification des formulaires

    //-- On sélectionne le contenu à afficher en en fonction de si la personne est connecté ou non
    if(userConnected() == true){
        /* ENREGISTREMENT DE COMPTE */
        // Si un formulaire a été transmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pet-pic'])) {
            try {
                if(imgSecure(pathinfo($_FILES['pet-pic']['name']), $_FILES['pet-pic']['size']) == true){
                    // On vérifie que les variables soient conformes
                    if(regexName($_POST['pet-name']) == true && regexName($_POST['pet-color'], 1) == true && regexWaist($_POST['pet-waist']) == true && regexAge($_POST['pet-age']) == true && regexPuce($_POST['pet-puce']) == true && regexText($_POST['pet-physic']) == true && regexText($_POST['pet-comport']) == true && regexLongAdress($_POST['pet-adress'], 1) == true){
                        // On vérifie qu'OSM a bien trouvé l'adresse
                        $coords = getCoords($_POST['pet-adress']);
                        if($coords != false){
                            // On enregistre les variables dans la base de données
                            if(registerPet("1", $_POST['pet-name'], $_POST['pet-sex'], $_POST['pet-color'], $_POST['pet-waist'], $_POST['pet-age'], $_POST['pet-puce'], htmlspecialchars($_POST['pet-physic']), htmlspecialchars($_POST['pet-comport']), pathinfo($_FILES['pet-pic']['name']), $_FILES['pet-pic']['tmp_name'], $_POST['pet-adress'], $coords, $_POST['pet-date'], $_POST['pet-time'], $_POST['race'], $_POST['spicies'], $_SESSION["id_user"]) == true){
                                // On vérifie si il y a un lien entre deux annonces
                                $pets = getAllPetInfo();
                                foreach($pets as $pet){ // On analyse tous les signalements et on regarde si ils sont dans un périmètre de 5km
                                    if(round(getDistance($coords['lat'], $coords['lon'], $pet['lat'], $pet['lon']) / 1000) <= 5 && $pet['id_spicies'] == $_POST['spicies']){
                                        if($pet['id_user'] != $_SESSION['id_user']){
                                            // Pour l'user qui vient de poster l'annonce
                                            addNotif('success', "Une annonce correspond à votre signalement. <br><a href=\"?p=pet_profil&id=".$pet['id_pet']."\">Voir l'annonce en détail</a>", $_SESSION["id_user"]);
                                            // Pour les autres users
                                            addNotif('success', "Une annonce correspond à votre signalement. <br><a href=\"?p=pet_profil&id=".$pet['id_pet']."\">Voir l'annonce en détail</a>", $pet['id_user']);
                                        }
                                    }
                                }
                                require 'controller_index.php';// Affichage de l'acceuil
                                addNotif(0, "Votre signalement a été ajouté à la liste.", $_SESSION["id_user"]);
                                notifGenerator('success', 'C\'EST NOTE !', 'Nous avons bien enregistré votre signalement.');
                            }
                            else{
                                require 'views/lost.php'; //- Affichage du formulaire pour déclarer la perte de son animal
                                notifGenerator('error', 'ERREUR', 'Erreur serveur lors de l\'enregistrement dans la base de données.');
                            }
                        }
                        else{
                            require 'views/lost.php'; //- Affichage du formulaire pour déclarer la perte de son animal
                            notifGenerator('error', 'ERREUR', 'Nous n\'arrivons pas à trouver cette adresse sur la carte.');
                        }
                    }
                    else{
                        require 'views/lost.php'; //- Affichage du formulaire pour signaler que l'user a perdu un animal
                        notifGenerator('error', 'ERREUR', 'Erreur lors du remplissage du formulaire.');
                    }
                }
                else{
                    require 'views/lost.php'; //- Affichage du formulaire pour déclarer la perte de son animal
                    notifGenerator('error', 'ERREUR', 'Image trop volumineuse ou au format incorrect.');
                }
            } catch (Exception $e) {
                require 'views/lost.php'; //- Affichage du formulaire pour déclarer la perte de son animal
                notifGenerator('error', 'ERREUR', "Erreur lors de l'envoie des données.");
            }
        }
        else{
            require 'views/lost.php'; //- Affichage du formulaire pour déclarer la perte de son animal
        }
    }
    else{
        require 'controllers/controller_compte.php'; // Affichage du formulaire de connexion
    }
?>