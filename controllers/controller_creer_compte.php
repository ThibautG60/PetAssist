<?php
    require 'models/database.php'; // Importation des fonctions de communication avec la BDD
    require 'models/database_users.php'; // Importation des fonctions de communication avec la BDD des utilisateurs

    if (isset($_FILES['profil-Pic'])) {
        if(imgSecure(pathinfo($_FILES['profil-Pic']['name']), $_FILES['profil-Pic']['size']) == true){
            if(registerUser($_POST['firstname'], $_POST['lastname'], $_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['adress'], $_POST['city'], $_POST['postal_code'], pathinfo($_FILES['profil-Pic']['name']), $_FILES['profil-Pic']['tmp_name']) == true){
                require 'controller_compte.php';// Affichage du formulaire de création de compte
            }
            else{
                require 'views/caccount.php';// Affichage du formulaire de création de compte
            }
        }
        else{
            require 'views/caccount.php';// Affichage du formulaire de création de compte 
        }
    }
    else{
        require 'views/caccount.php';// Affichage du formulaire de création de compte
    }

    /* Fonction pour vérifier l'extension du fichier transmis */
    function imgSecure($img, $imgSize){
        $extension = $img['extension'];
        if(($extension == 'JPG' || $extension == 'JPEG' || $extension == 'PNG') && $imgSize <= 56000000){
            return true;
        }
        else{
            return false;
        }
    }
?>