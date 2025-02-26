<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_users.php'; // Importation des fonctions pour manipuler la bdd users
    require_once 'models/database_pets.php'; // Fonctions qui permettent de manipuler la BDD qui concerne les animaux
    require_once 'templates/notif.php'; // Importation de la fonction des notifications
    require_once 'controllers/controller_regex.php'; // Importation des fonctions de vérification des formulaires

    if(userConnected() == true && getAdminLvl($_SESSION["id_user"])['admin_type'] != 0){ // On vérifie que l'user soit connecté & qu'il soit modérateur
        if($_GET['p'] == "temoignage"){ // page "goldenbook"
            if(isset($_GET['d'])){ // Si le modérateur veut supprimer un témoignage
                if(deleteTestimony($_GET['d']) == true){
                    require_once 'views/goldenbook.php';//- Affichage de la page des témoignages
                    notifGenerator('success', 'C\'EST BON', 'Le témoignage a bien été supprimé.');
                }
                else{
                    require_once 'views/goldenbook.php';//- Affichage de la page des témoignages
                    notifGenerator('error', 'ERREUR', 'La suppression a échoué.');
                }
            }
            elseif(isset($_GET['m'])){ // Si le modérateur veut modifier un témoignage
                if(isset($_POST['content'])){
                    // On vérifie que les variables soient conformes
                    if(regexText($_POST['content'], 1) == true){
                        if(ModifyPetTestimony($_GET['m'], $_POST['content']) == true){
                            require_once 'views/goldenbook.php';//- Affichage de la page des témoignages
                            notifGenerator('success', 'C\'EST BON', 'Les informations ont été enregistrées.');
                        }
                        else{
                            require_once 'views/admin_mtestimony.php';//- Affichage de la page des témoignages
                            notifGenerator('error', 'ERREUR', 'Les informations n\'ont pas pu s\'enregistrer.');
                        }
                    }
                    else{
                        require_once 'views/admin_mtestimony.php';//- Affichage de la page des témoignages
                        notifGenerator('error', 'ERREUR', 'Erreur lors du remplissage du formulaire.');
                    }
                }
                else{
                    require_once 'views/admin_mtestimony.php';//- Affichage de la page des témoignages
                }
            }
        }
        else if($_GET['p'] == "pet_profil"){ // page "petprofil"
            if(isset($_GET['d'])){ // Si le modérateur veut supprimer un profil animal
                if(deletePetProfil($_GET['d']) == true){
                    require_once 'views/acceuil.php';//- Affichage de la page d'acceuil
                    notifGenerator('success', 'C\'EST BON', 'Le profil de l\'animal a bien été supprimé.');
                }
                else{
                    require_once 'views/acceuil.php';//- Affichage de la page d'acceuil
                    notifGenerator('error', 'ERREUR', 'La suppression a échoué.');
                }
            }
            elseif(isset($_GET['m'])){ // Si le modérateur veut modifier un profil animal
                if(isset($_POST['pet-adress']) && isset($_FILES["pet-pic"]) && $_FILES["pet-pic"]['name'] != ""){ // Si le modérateur a UP une img
                    // On vérifie que les variables soient conformes
                    if(regexName($_POST['pet-name']) == true && regexName($_POST['pet-color'], 1) == true && regexWaist($_POST['pet-waist']) == true && regexAge($_POST['pet-age']) == true && regexPuce($_POST['pet-puce']) == true && regexText($_POST['pet-physic']) == true && regexText($_POST['pet-comport']) == true && regexLongAdress($_POST['pet-adress'], 1) == true){
                        if(ModifyPetProfil($_GET['m'], $_POST['pet-name'], $_POST['pet-color'], $_POST['pet-waist'], $_POST['pet-age'], $_POST['pet-puce'], $_POST['pet-physic'], $_POST['pet-comport'], $_POST['pet-adress'], $_POST['pet-date'], $_POST['pet-time'], pathinfo($_FILES['pet-pic']['name']), $_FILES['pet-pic']['tmp_name'], getCoords($_POST['pet-adress'])) == true){
                            require_once 'views/acceuil.php';//- Affichage de la page d'acceuil
                            notifGenerator('success', 'C\'EST BON', 'Les informations ont été enregistrées.');
                        }
                        else{
                            require_once 'views/admin_mpetprofil.php';//- Affichage de la page de modification des profils animaux
                            notifGenerator('error', 'ERREUR', 'Les informations n\'ont pas pu s\'enregistrer.');
                        } 
                    }
                    else{
                        require_once 'views/admin_mpetprofil.php';//- Affichage de la page de modification des profils animaux
                        notifGenerator('error', 'ERREUR', 'Erreur lors du remplissage du formulaire.');                       
                    }
                }
                else if(isset($_POST['pet-adress'])){ // Si le modérateur n'a pas UP d'img
                    // On vérifie que les variables soient conformes
                    if(regexName($_POST['pet-name']) == true && regexName($_POST['pet-color'], 1) == true && regexWaist($_POST['pet-waist']) == true && regexAge($_POST['pet-age']) == true && regexPuce($_POST['pet-puce']) == true && regexText($_POST['pet-physic']) == true && regexText($_POST['pet-comport']) == true && regexLongAdress($_POST['pet-adress'], 1) == true){
                        if(ModifyPetProfil($_GET['m'], $_POST['pet-name'], $_POST['pet-color'], $_POST['pet-waist'], $_POST['pet-age'], $_POST['pet-puce'], $_POST['pet-physic'], $_POST['pet-comport'], $_POST['pet-adress'], $_POST['pet-date'], $_POST['pet-time'], 0, 0, getCoords($_POST['pet-adress'])) == true){
                            require_once 'views/acceuil.php';//- Affichage de la page d'acceuil
                            notifGenerator('success', 'C\'EST BON', 'Les informations ont été enregistrées.');
                        }
                        else{
                            require_once 'views/admin_mpetprofil.php';//- Affichage de la page de modification des profils animaux
                            notifGenerator('error', 'ERREUR', 'Les informations n\'ont pas pu s\'enregistrer.');
                        } 
                    }
                    else{
                        require_once 'views/admin_mtestimony.php';//- Affichage de la page des témoignages
                        notifGenerator('error', 'ERREUR', 'Erreur lors du remplissage du formulaire.');
                    }
                }
                else{
                    require_once 'views/admin_mpetprofil.php';//- Affichage de la page de modification des profils animaux
                }
            }
        }
        else if($_GET['p'] == "vcompte"){ // page "accountview"
            if(isset($_GET['d'])){ // Si le modérateur veut supprimer un profil user
                if(deleteUserProfil($_GET['d']) == true){
                    require_once 'views/acceuil.php';//- Affichage de la page d'acceuil
                    notifGenerator('success', 'C\'EST BON', 'L\'utilisateur a été banni.');
                }
                else{
                    require_once 'views/acceuil.php';//- Affichage de la page d'acceuil
                    notifGenerator('error', 'ERREUR', 'Le bannissement a échoué.');
                }
            }
            elseif(isset($_GET['m'])){ // Si le modérateur veut modifier un profil user
                if(isset($_POST['pseudo']) && isset($_FILES["profil-Pic"]) && $_FILES["profil-Pic"]['name'] != ""){ // Si le modérateur a UP une img
                    // On vérifie que les variables soient conformes
                    if(regexPseudo($_POST['pseudo'], 1) == true){
                        if(ModifyUserProfil($_GET['m'], $_POST['pseudo'], pathinfo($_FILES['profil-Pic']['name']), $_FILES['profil-Pic']['tmp_name']) == true){
                            require_once 'views/acceuil.php';//- Affichage de la page d'acceuil
                            notifGenerator('success', 'C\'EST BON', 'Les informations ont été enregistrées.');
                        }
                        else{
                            require_once 'views/admin_maccount.php';//- Affichage de la page de modif du compte
                            notifGenerator('error', 'ERREUR', 'Les informations n\'ont pas pu s\'enregistrer.');
                        } 
                    }
                    else{
                        require_once 'views/admin_maccount.php';//- Affichage de la page de modif du compte
                        notifGenerator('error', 'ERREUR', 'Erreur lors du remplissage du formulaire.');
                    }
                }
                if(isset($_POST['pseudo'])){ // Si le modérateur n'a pas UP d'img
                    // On vérifie que les variables soient conformes
                    if(regexPseudo($_POST['pseudo'], 1) == true){
                        if(ModifyUserProfil($_GET['m'], $_POST['pseudo'], 0, 0) == true){
                            require_once 'views/acceuil.php';//- Affichage de la page d'acceuil
                            notifGenerator('success', 'C\'EST BON', 'Les informations ont été enregistrées.');
                        }
                        else{
                            require_once 'views/admin_maccount.php';//- Affichage de la page de modif du compte
                            notifGenerator('error', 'ERREUR', 'Les informations n\'ont pas pu s\'enregistrer.');
                        } 
                    }
                    else{
                        require_once 'views/admin_maccount.php';//- Affichage de la page de modif du compte
                        notifGenerator('error', 'ERREUR', 'Erreur lors du remplissage du formulaire.');
                    }
                }
                else{
                    require_once 'views/admin_maccount.php';//- Affichage de la page de modif du compte
                }
            }
        }
        else{
            require 'controllers/controller_index.php'; //- Retour à l'acceuil pour éviter les bugs
            notifGenerator('error', 'ERREUR', 'Vous ne pouvez pas accéder à cette page.');
        }
    }
    else{
        require 'controllers/controller_index.php'; //- Retour à l'acceuil pour éviter les bugs
        notifGenerator('error', 'ERREUR', 'Vous ne pouvez pas accéder à cette page.');
    }
?>