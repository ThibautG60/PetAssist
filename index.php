<?php 
/* FICHIER DE REDIRECTION BASIQUE */
require 'utils/php_errors.php'; // On charge le fihcier PHP pour afficher les erreurs PHP
session_start(); // On démarre la session

//-- On redirige vers le bon controller --
if(!isset($_GET['p'])){ // Si il n'y a pas de catégories dans l'URL, on charge l'acceuil
    require 'controllers/controller_index.php';
}
else{ // Sinon on charge le controller adapté à la page
    $link = 'controllers/controller_'.$_GET['p'].'.php';

    switch ($_GET['p']){ // Si la page demandé fait parti de cette liste, on affiche la page (Pas besoin de controller étant donné qu'il n'y a aucun calcul à faire)
        case 'conseils';
            require 'views/static/advices.php'; // Page conseils
            break;
        case 'faq';
            require 'views/static/faq.php'; // Page faq
            break;
        case 'reglement';
            require 'views/static/rules.php'; // Page règlement du site
            break;
        case 'mentions';
            require 'views/static/mentions.php'; // Page règlement des mentions légales
            break;
        default: // Sinon on importe le controller correspondant
            if (file_exists($link)) {
                require $link; // On importe le controller correspondant
            } else {
                require 'views/static/404.php'; // En cas d'échec de l'ouverture du controller on affiche l'erreur 404
            }
            break;
    }
}
?>