<?php
    require_once 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require_once 'models/database_users.php'; // Importation des fonctions pour manipuler la bdd users
    require_once 'templates/notif.php'; // Importation de la fonction des notifications

    // Si la personne a cliqué sur "se déconnecter" 
    if(isset($_POST["deconnect"]) && $_POST["deconnect"] == 'Se déconnecter'){
        if(disconnectUser() == true)notifGenerator('info', 'A bientôt', 'Vous êtes déconnecté.');
    }
    //-- On sélectionne le contenu à afficher en en fonction de si la personne est connecté ou non
    if(userConnected() == true){
        // Si la personne a cliqué sur "modifier son compte" 
        if(isset($_POST["modify"]) && $_POST["modify"] == 'Modifier mon compte'){
            require 'controllers/controller_modifier_compte.php';//- Appel du controller pour le formulaire de modification de compte
        }
        else{
            require 'views/account.php';//- Affichage du compte personnel de l'utilisateur
        }
    }
    else{
        /* CONNEXION AU COMPTE */
        // Si le formulaire a été transmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
            // On vérifie qu'il soit conforme
            if(passVerify($_POST['email'], hash_hmac('sha256', $_POST['password'], 'path')) == true){
                if(loginUser($_POST['email']) == true){
                    if(isset($_POST['steelconnect']) && $_POST['steelconnect'] == 'on'){
                        setcookie("connected", 'true', time()+60*60*24*30); // On fait un cookie valable 1 mois
                    }
                    else {
                        $_SESSION["connected"] = 'true';
                    }
                    if($_GET['p'] == 'perdu'){ // Si l'utilisateur vient pour la page "perdu"
                        require 'controllers/controller_perdu.php';
                    }
                    else if($_GET['p'] == 'trouve'){ // Si l'utilisateur vient pour la page "trouvé"
                        require 'controllers/controller_trouve.php';
                    }
                    else{ // Si l'utilisateur vient pour son compte
                        require 'views/account.php';//- Affichage du compte personnel de l'utilisateur
                    }
                    notifGenerator('success', 'Bienvenue', 'Vous êtes connecté.');
                }
                else{
                    require 'views/login.php';//- Affichage du formulaire de connexion
                    notifGenerator('error', 'ERREUR', 'Problème lors de la chargement de votre compte.');
                }
            }
            else{
                require 'views/login.php';//- Affichage du formulaire de connexion
                notifGenerator('error', 'ERREUR', 'Adresse email ou mot de passe incorrect.');
            }
        }
        else{
            require 'views/login.php';//- Affichage du formulaire de connexion
        }
    }
?>