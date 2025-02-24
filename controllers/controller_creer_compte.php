<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_users.php'; // Importation des fonctions de communication avec la BDD des utilisateurs
    require_once 'templates/notif.php'; // Importation de la fonction des notifications

    //-- On sélectionne le contenu à afficher en en fonction de si la personne est connecté ou non
    if(userConnected() == true){
        require 'controllers/controller_index.php'; //- Retour à l'acceuil pour éviter les bugs
    }
    else{
        /* ENREGISTREMENT DE COMPTE */
        // Si un formulaire a été transmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profil-Pic'])) {
            // On vérifie qu'il soit conforme
            if(imgSecure(pathinfo($_FILES['profil-Pic']['name']), $_FILES['profil-Pic']['size']) == true){
                // On enregistre les variables dans la base de données
                if(registerUser($_POST['firstname'], $_POST['lastname'], $_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['adress'], $_POST['city'], $_POST['postal_code'], pathinfo($_FILES['profil-Pic']['name']), $_FILES['profil-Pic']['tmp_name']) == true){
                    require 'controller_compte.php';// Affichage du compte personnel
                }
                else{
                    require 'views/caccount.php';// Affichage du formulaire de création de compte
                    notifGenerator('error', 'ERREUR', 'Erreur serveur lors de l\'enregistrement dans la base de données.');
                }
            }
            else{
                require 'views/caccount.php';// Affichage du formulaire de création de compte 
                notifGenerator('error', 'ERREUR', 'Image trop volumineuse ou au format incorrect.');
            }
        }
        else{
            require 'views/caccount.php';// Affichage du formulaire de création de compte
        }
    }
?>