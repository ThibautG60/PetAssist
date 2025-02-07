<?php
    //-- On sélectionne le contenu à afficher en enfonction de la variable page
    switch($currentPage){
        case 'login';
            include_once 'view/login.php';//- affichage du formulaire de connexion
            break;
        case 'create';
            include_once 'view/caccount.php';//- affichage du formulaire de création de compte
            break;
        case 'user';
            include_once 'view/account.php';//- affichage du compte personnel de l'utilisateur
            break;
        case 'vuser';
            include_once 'view/accountview.php';//- affichage du formulaire pour modifier son compte
            break;
        case 'amodify';
            include_once 'view/maccount.php';//- affichage du formulaire pour modifier son compte
            break;
        case 'plost';
            include_once 'view/passlost.php';//- affichage du formulaire pour récupérer son mot de passe
            break;
    }
?>