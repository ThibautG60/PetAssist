<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_users.php'; // Importation des fonctions pour manipuler la bdd users
    require_once 'templates/notif.php'; // Importation de la fonction des notifications
    require_once 'controllers/controller_regex.php'; // Importation des fonctions de vérification des formulaires

    //-- On sélectionne le contenu à afficher en en fonction de si la personne est connecté ou non
    if(userConnected() == true){
        if(isset($_POST['firstname'])){ // Si un formulaire est soumis
            //On vérifie que les variables soient conformes
            if(regexName($_POST['firstname'], 1) == true && regexName($_POST['lastname'], 1) == true && regexPseudo($_POST['pseudo'], 1) == true && regexMail($_POST['email'], 1) == true && regexPassword($_POST['password']) == true && regexAdress($_POST['adress'], 1) == true && regexName($_POST['city'], 1) == true && regexPostalCode($_POST['postal_code'], 1) == true){ 
                $uInfo = getUserImg($_SESSION["id_user"]);
                //On vérifie que le pseudo & le mail ne soient pas déjà utilisés
                $mail;
                $pseudo;

                //Mail
                if($uInfo['mail'] == $_POST['email'])$mail = true;
                else{
                    if(dataExist('mail', $_POST['email']) == false)$mail = true;
                    else $mail = false;
                }
                //Pseudo
                if($uInfo['pseudo'] == $_POST['pseudo'])$pseudo = true;
                else{
                    if(dataExist('pseudo', $_POST['pseudo']) == false)$pseudo = true;
                    else $pseudo = false;
                }

                if($mail == true && $pseudo == true){ 
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
                else{
                    require 'views/maccount.php';// Affichage du formulaire de modification de compte 
                    notifGenerator('error', 'ERREUR', 'Adresse mail ou pseudo déjà utilisé.');
                }
            }
            else{
                include 'views/maccount.php';//- affichage du formulaire pour modifier son compte
                notifGenerator('error', 'ERREUR', 'Erreur lors du remplissage du formulaire.');
            }
        }
        else include 'views/maccount.php';//- affichage du formulaire pour modifier son compte
    }
    else include 'controllers/controller_index.php'; //- Retour à l'acceuil pour éviter les bugs
?>