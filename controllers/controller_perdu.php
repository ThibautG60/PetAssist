<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_users.php'; // Importation des fonctions pour manipuler la bdd users
    require_once 'models/database_pets.php'; // Fonctions qui permettent de manipuler la BDD qui concerne les animaux
    require_once 'templates/notif.php'; // Importation de la fonction des notifications
    
    //-- On sélectionne le contenu à afficher en en fonction de si la personne est connecté ou non
    if(userConnected() == true){
        /* ENREGISTREMENT DE COMPTE */
        // Si un formulaire a été transmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pet-pic'])) {
            try {
                if(imgSecure(pathinfo($_FILES['pet-pic']['name']), $_FILES['pet-pic']['size']) == true){
                    // On enregistre les variables dans la base de données
                    if(registerPet("1", $_POST['pet-name'], 
                    $_POST['pet-sex'], $_POST['pet-color'],
                    $_POST['pet-waist'], $_POST['pet-age'],
                    $_POST['pet-puce'], $_POST['pet-physic'],
                    $_POST['pet-comport'], pathinfo($_FILES['pet-pic']['name']), 
                    $_FILES['pet-pic']['tmp_name'], $_POST['pet-adress'],
                    getCoords($_POST['pet-adress']), $_POST['pet-date'],
                    $_POST['pet-time'], $_POST['race'], $_POST['spicies'], $_SESSION["id_user"]) == true){
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