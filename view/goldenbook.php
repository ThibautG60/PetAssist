<?php /* FONCTIONS */
//- Générateur de témoignage des données en argument
function testimonyGenerator($i, $boxType, $name, $petName, $img, $text){
    echo '<article class="goldenitem'.$boxType.'">';// Classe en fonction de si l'id dans le générateur est pair ou impair
    echo '<h3>'.$name.' et '.$petName.'</h3>';// Titre
    echo '<div class="item-body">';

    if($boxType == 1){// Position de la phot de profil en fonction de l'id du témoignage dans le générateur
        echo '<a class="item-box" href="?profil='.$name.'" title="Lien vers le profil"><img class="item-img" src="./assets/img/profil/'.$img.'" alt="Photo de profil"></a>';
    }
    echo '<p class="item-text">'.$text.'</p>';// Témoignage
    if($boxType == 2){// Position de la phot de profil en fonction de l'id du témoignage dans le générateur
        echo '<a class="item-box" href="?profil='.$name.'" title="Lien vers le profil"><img class="item-img" src="./assets/img/profil/'.$img.'" alt="Photo de profil"></a>';
    }
    echo '<div class="profil-link" href="?profil='.$name.'">Profil de '.$name.'</div>';

    /* Bouttons admin */
    echo '<div class="icon-admin-box">';
    echo '<button id="modify'.$i.'" class="btn-admin"><img src="./assets/img/icons/modify.png" class="icon-admin" alt="Icone administrateur"></button>';
    echo '<button id="delete'.$i.'" class="btn-admin"><img src="./assets/img/icons/delete.png" class="icon-admin" alt="Icone administrateur"></button>';
    echo '</div>';
    echo '</div>';
    echo '</article>';
}
?>

<head>
    <link rel="stylesheet" href="assets/css/adminstyle.css">
    <link rel="stylesheet" href="assets/css/goldenstyle.css">
    <title>Pet Assist' - Témoignages</title>
</head>

<section class="articlefixe">
    <h1 class="articletitle">Témoignages et Histoires de retrouvailles</h1>
    <h2 class="articletitle">Pour ne pas perdre espoir</h2>
    <div class="line"></div>
    <div class="description">Voici quelques témoignages vérifiés de personnes de la communauté. Si vous voulez poster votre histoire et apparaitre sur cette page, contactez nous via l'onglet ' Nous contacter '.</div>
    <?php 
    //- Fonction pour afficher les messages dans la page ' temoignages '
    if (isset($jsonData)) {
        global $jsonData; // Variable des données
        $i = 0; // Variable de l'id du comment (Pour la mise en page)

        // On affiche tous les témoignages tirés du JSON 'data'
        foreach($jsonData['goldenbook'] as $comment){
            $pair = 2; // Variable pour savoir si c'est pair ou impair (Pour la mise en page)
            if ($i % 2 == 0) { $pair = 1; }
            if($i == 0){// Le tout premier témoignage
                echo '<div id="booktop">';
                echo '<div id="bookflex">';
                testimonyGenerator($i, $pair, $comment['name'], $comment['petName'], $comment['profilPic'], $comment['text']);
                $i++;
            }
            else if($i == 1){// Le deuxième témoignage
                testimonyGenerator($i, $pair, $comment['name'], $comment['petName'], $comment['profilPic'], $comment['text']);
                echo '</div>';
                echo '<img src="assets/img/right_book.jpeg" alt="Photo de chien" class="bookimg tabmediacut" id="imgbookright">';
                echo '</div>';
                $i++;
            }
            else {// Tous les autres témoignages
                testimonyGenerator($i, $pair, $comment['name'], $comment['petName'], $comment['profilPic'], $comment['text']);
                $i++;
            }
        }
    }
    ?>
    </div>
</section>
