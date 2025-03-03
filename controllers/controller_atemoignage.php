<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_users.php'; // Importation des fonctions pour manipuler la bdd users
    require_once 'models/database_pets.php'; // Fonctions qui permettent de manipuler la BDD qui concerne les animaux
    require_once 'templates/notif.php'; // Importation de la fonction des notifications
    require_once 'controllers/controller_regex.php'; // Importation des fonctions de vérification des formulaires

    if(userConnected() == true && isset($_GET['id'])){ // On vérifie que l'user est bien connecté
        if(isset($_POST['content'])){ // Si le formulaire a été soumis
            if(regexText($_POST['content'], 1) == true){
                if(ModifyPetTestimony($_GET['id'], $_POST['content']) == true){
                    header("Location: ?p=temoignage");
                }
                else{
                    require_once 'views/atestimony.php'; // Affichage de la page pour ajouter un témoignage
                    notifGenerator('error', 'ERREUR', 'Problème lors de l\'enregistrement du témoignage.');
                }
            }
            else{
                require_once 'views/atestimony.php'; // Affichage de la page pour ajouter un témoignage
                notifGenerator('error', 'ERREUR', 'Caractère non autorisé ou le témoignage est trop court.');
            }
        }
        else{
            $petInfo = getPetInfo($_GET['id']);

            if($petInfo['id_user'] == $_SESSION["id_user"]){ // On vérifie que ce soit bien, son annonce dont il veut parler
                require_once 'views/atestimony.php'; // Affichage de la page pour ajouter un témoignage
            }
            else{
                require 'controllers/controller_index.php'; //- Retour à l'acceuil pour éviter les bugs
                notifGenerator('error', 'ERREUR', 'Ce n\'est pas votre animal.');
            }
        }
    }
    else{
        require 'controllers/controller_index.php'; //- Retour à l'acceuil pour éviter les bugs
        notifGenerator('error', 'ERREUR', 'Vous ne pouvez pas accéder à cette page.');
    }
?>