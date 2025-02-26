<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_users.php'; // Importation des fonctions pour manipuler la bdd users
    require_once 'templates/notif.php'; // Importation de la fonction des notifications

    //-- On sélectionne le contenu à afficher en en fonction de si la personne est connecté ou non
    if(userConnected() == true){
        if(isset($_POST['firstname'])){ // Si un formulaire est soumis
            if(isset($_FILES["profil-Pic"]) && $_FILES["profil-Pic"]['name'] != ""){ // Si l'user a UP une img
                if(isset($_POST['password']) && $_POST['password'] != ""){ // Si l'user a modifié son password
                    if(ModifyUserProfilByUser($_SESSION["id_user"], $_POST['firstname'], $_POST['lastname'], $_POST['pseudo'], $_POST['email'], $_POST['password'], pathinfo($_FILES['profil-Pic']['name']), $_FILES['profil-Pic']['tmp_name'], $_POST['adress'], $_POST['city'], $_POST['postal_code']) == true){
                        require_once 'controllers/controller_compte.php';//- Affichage du compte de l'user
                        notifGenerator('success', 'C\'EST BON', 'Les informations ont été enregistrées.');
                    }
                    else{
                        include 'views/maccount.php';//- affichage du formulaire pour modifier son compte
                        notifGenerator('error', 'ERREUR', 'Les informations n\'ont pas pu s\'enregistrer.');
                    }
                }
                else{ // Si l'user n'a pas modifié son password
                    if(ModifyUserProfilByUser($_SESSION["id_user"], $_POST['firstname'], $_POST['lastname'], $_POST['pseudo'], $_POST['email'], 0, pathinfo($_FILES['profil-Pic']['name']), $_FILES['profil-Pic']['tmp_name'], $_POST['adress'], $_POST['city'], $_POST['postal_code']) == true){
                        require_once 'controllers/controller_compte.php';//- Affichage du compte de l'user
                        notifGenerator('success', 'C\'EST BON', 'Les informations ont été enregistrées.');
                    }
                    else{
                        include 'views/maccount.php';//- affichage du formulaire pour modifier son compte
                        notifGenerator('error', 'ERREUR', 'Les informations n\'ont pas pu s\'enregistrer.');
                    }
                }
            } 
            else{ // Si l'user n'a pas UP d'img
                if(isset($_POST['password']) && $_POST['password'] != ""){ // Si l'user a modifié son password
                    if(ModifyUserProfilByUser($_SESSION["id_user"], $_POST['firstname'], $_POST['lastname'], $_POST['pseudo'], $_POST['email'], $_POST['password'], 0, 0, $_POST['adress'], $_POST['city'], $_POST['postal_code']) == true){
                        require_once 'controllers/controller_compte.php';//- Affichage du compte de l'user
                        notifGenerator('success', 'C\'EST BON', 'Les informations ont été enregistrées.');
                    }
                    else{
                        include 'views/maccount.php';//- affichage du formulaire pour modifier son compte
                        notifGenerator('error', 'ERREUR', 'Les informations n\'ont pas pu s\'enregistrer.');
                    }
                }
                else{ // Si l'user n'a pas modifié son password
                    if(ModifyUserProfilByUser($_SESSION["id_user"], $_POST['firstname'], $_POST['lastname'], $_POST['pseudo'], $_POST['email'], 0, 0, 0, $_POST['adress'], $_POST['city'], $_POST['postal_code']) == true){
                        require_once 'controllers/controller_compte.php';//- Affichage du compte de l'user
                        notifGenerator('success', 'C\'EST BON', 'Les informations ont été enregistrées.');
                    }
                    else{
                        include 'views/maccount.php';//- affichage du formulaire pour modifier son compte
                        notifGenerator('error', 'ERREUR', 'Les informations n\'ont pas pu s\'enregistrer.');
                    }
                }
            }
        }
        else include 'views/maccount.php';//- affichage du formulaire pour modifier son compte
    }
    else include 'controllers/controller_index.php'; //- Retour à l'acceuil pour éviter les bugs
?>