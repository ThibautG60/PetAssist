<?php
    //-- On sélectionne le contenu à afficher en enfonction de la variable page
    switch($currentPage){
        case 'lost';
            include_once 'view/lost.php';//- affichage du formulaire animal perdu
            break;
        case 'found';
            include_once 'view/found.php';//- affichage du formulaire animal trouvé
            break;
        case 'profil';
            include_once 'view/petprofil.php';//- affichage des infos sur l'animal
            break;
    }
?>