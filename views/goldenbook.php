<?php
//- Générateur de témoignage des données en argument
function testimonyGenerator($i, $boxType, $userID, $name, $petName, $img, $text, $petID){
    echo '<article class="goldenitem'.$boxType.'">';// Classe en fonction de si l'id dans le générateur est pair ou impair
    if($petName != "")echo '<h3>'.$name.' et '.$petName.'</h3>';// Titre
    else echo '<h3>Le témoignage de '.$name.'</h3>';// Titre
    echo '<div class="item-body">';

    if($boxType == 1){// Position de la phot de profil en fonction de l'id du témoignage dans le générateur
        echo '<a class="item-box" href="?p=vcompte&id='.$userID.'" title="Lien vers le profil"><img class="item-img" src="./assets/img/profil/'.$img.'" alt="Photo de profil"></a>';
    }
    echo '<p class="item-text">'.$text.'</p>';// Témoignage
    if($boxType == 2){// Position de la phot de profil en fonction de l'id du témoignage dans le générateur
        echo '<a class="item-box" href="?p=vcompte&id='.$userID.'" title="Lien vers le profil"><img class="item-img" src="./assets/img/profil/'.$img.'" alt="Photo de profil"></a>';
    }
    echo '<a class="profil-link" href="?p=vcompte&id='.$userID.'">Profil de '.$name.'</a>';

    /* Bouttons admin */
    if(userConnected() == true && getAdminLvl($_SESSION["id_user"])['admin_type'] != 0){ // On vérifie que l'user soit connecté & qu'il soit modérateur
        echo '<div class="icon-admin-box">';
        echo '<a href="?p=temoignage&m='.$petID.'" id="modify'.$petID.'" class="btn-admin modify"><img src="./assets/img/icons/modify.png" class="icon-admin" alt="Icone administrateur"></a>';
        echo '<a href="?p=temoignage&d='.$petID.'" id="delete'.$petID.'" class="btn-admin delete"><img src="./assets/img/icons/delete.png" class="icon-admin" alt="Icone administrateur"></a>';
        echo '</div>';
    }
    echo '</div>';
    echo '</article>';
}
?>

<head>
    <!-- Infos générales sur le site -->
    <meta charset="UTF-8">
    <meta name="description" content="Page d'accueil de Pet Assist'">
    <meta name="keywords" content="Animaux perdu,Pet Assist,Recherche animaux">
    <meta name="author" content="Thibaut GERARD">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/iconsite.png" />
    <title>Pet Assist' - Témoignages</title>

    <!-- Importation des fichiers CSS -->
    <link rel="stylesheet" href="assets/css/stylebase.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/adminstyle.css">
    <link rel="stylesheet" href="assets/css/goldenstyle.css">

    <!-- Importation des fichiers JS pour bootstrap & animations -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script defer src="assets/js/animations.js"></script>
</head>

<body>
    <?php require_once 'templates/header.php'; // Affichage du header ?>
    <main>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="paw">
            <path
                d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z" />
        </svg>
        <section class="articlefixe">
            <h1 class="articletitle">Témoignages et Histoires de retrouvailles</h1>
            <h2 class="articletitle">Pour ne pas perdre espoir</h2>
            <div class="line"></div>
            <div class="description">Voici quelques témoignages vérifiés de personnes de la communauté. Si vous voulez poster votre histoire et apparaitre sur cette page, contactez nous via l'onglet ' Nous contacter '.</div>
            <?php 
            //- Affichage des témoignages
            $testimonys = getAllTestimony();
            if ($testimonys != false) {
                $i = 0; // Variable de l'id du comment (Pour la mise en page)

                // On affiche tous les témoignages tirés du JSON 'data'
                foreach($testimonys as $testimony){
                    $uInfo = getUserImg($testimony['id_user']);
                    $pair = 2; // Variable pour savoir si c'est pair ou impair (Pour la mise en page)
                    if ($i % 2 == 0) { $pair = 1; }
                    if($i == 0){// Le tout premier témoignage
                        echo '<div id="booktop">';
                        echo '<div id="bookflex">';
                        testimonyGenerator($i, $pair, $testimony['id_user'], $uInfo['pseudo'], $testimony['pet_name'], $uInfo['img_profil'], $testimony['testimony_text'], $testimony['id_pet']);
                        $i++;
                    }
                    else if($i == 1){// Le deuxième témoignage
                        testimonyGenerator($i, $pair, $testimony['id_user'], $uInfo['pseudo'], $testimony['pet_name'], $uInfo['img_profil'], $testimony['testimony_text'], $testimony['id_pet']);
                        echo '</div>';
                        echo '<img src="assets/img/right_book.jpeg" alt="Photo de chien" class="bookimg tabmediacut" id="imgbookright">';
                        echo '</div>';
                        $i++;
                    }
                    else {// Tous les autres témoignages
                        testimonyGenerator($i, $pair, $testimony['id_user'], $uInfo['pseudo'], $testimony['pet_name'], $uInfo['img_profil'], $testimony['testimony_text'], $testimony['id_pet']);
                        $i++;
                    }
                }
            }
            else{
                echo '<p class="articletitle">Aucun témoignage trouvé</p>';
            }
            ?>
            </div>
        </section>
    </main>
    <?php require_once 'templates/footer.php'; // Affichage du footer  ?>
</body>
</html>
