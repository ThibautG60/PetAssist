<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Infos générales sur le site -->
    <meta charset="UTF-8">
    <meta name="description" content="Page d'accueil de Pet Assist'">
    <meta name="keywords" content="Animaux perdu,Pet Assist,Recherche animaux">
    <meta name="author" content="Thibaut GERARD">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/iconsite.png" />
    <?php
    if($pInfo['pet_name'] != ""){
        echo '<title>Pet Assist\' - Profil de '.$pInfo['pet_name'].'</title>';
    }
    else{
        echo '<title>Pet Assist\' - Profil de l\'animal</title>';
    }
    ?> 

    <!-- Importation des fichiers CSS -->
    <link rel="stylesheet" href="assets/css/stylebase.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/accountstyle.css">
    <link rel="stylesheet" href="assets/css/adminstyle.css">
    <link rel="stylesheet" href="assets/css/msg.css">

    <!-- Importation des fichiers JS -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script defer src="assets/js/animations.js"></script>
    <script defer src="assets/js/msg.js"></script>
</head>

<body>
    <?php require_once 'templates/header.php'; // Affichage du header ?>
    <main>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="paw">
            <path
                d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z" />
        </svg>
        <section class="body-box">
            <div class="body-head-box">
                <div class="f100 icon-admin-box">
                    <?php 
                    if($pInfo['pet_name'] != ""){
                        echo '<h1 class="articletitle">'.$pInfo['pet_name'].'</h1>';
                    }
                    else{
                        $result = getRaceName($pInfo['id_race']);
                        if($pInfo['lost'] == 1)echo '<h1 class="articletitle">'.$result['race'].' perdu</h1>';
                        else echo '<h1 class="articletitle">'.$result['race'].' trouvé</h1>';
                    }
                    /* Bouttons admin */
                    if(userConnected() == true && getAdminLvl($_SESSION["id_user"])['admin_type'] != 0){ // On vérifie que l'user soit connecté & qu'il soit modérateur
                        echo '<a href="?p=pet_profil&id='.$pInfo['id_pet'].'&m='.$pInfo['id_pet'].'" id="modify'.$pInfo['id_pet'].'" class="btn-admin modify"><img src="./assets/img/icons/modify.png" class="icon-admin" alt="Icone administrateur"></a>';
                        echo '<a href="?p=pet_profil&id='.$pInfo['id_pet'].'&d='.$pInfo['id_pet'].'" id="delete'.$pInfo['id_pet'].'" class="btn-admin delete"><img src="./assets/img/icons/delete.png" class="icon-admin" alt="Icone administrateur"></a>';
                    }
                    ?>        
                </div>
                <div class="lineb"></div>
                <?php 
                if($pInfo['pet_name'] != ""){
                    echo '<p class="description f100">Cliquez sur le nom du profil du propriétaire pour accéder à son profil.<br>Voici les informations détaillées à propos de '.$pInfo['pet_name'].':</p>';
                }
                else{
                    echo '<p class="description f100">Cliquez sur le nom du profil du propriétaire pour accéder à son profil.<br>Voici les informations détaillées à propos de l\'animal:</p>';
                }
                ?>
            </div>
            <div class="info-profil-img">
                <?php 
                echo '<img src="assets/img/pet/'.$pInfo['img_pet'].'" alt="Photo de l\'animal" id="profil-pic">';
                if($pInfo['resolved'] == 1){
                    echo '<div id="resolved">RETROUVE</div>';
                }
                if(userConnected() == true){ 
                    echo '<button class="btn btn-primary msg-button">J’ai des informations ! (Contacter le propriétaire)</button>';
                    if($pInfo['resolved'] == 0 && $pInfo['id_user'] == $_SESSION["id_user"]){
                        echo '<a href="?p=pet_profil&id='.$_GET['id'].'&r=1" class="btn btn-success" id="resolved-button">J’ai retrouvé mon animal !</a>';
                    }
                }
                ?>
            </div>
            <div class="body-info-box">
                <h2>Informations sur l'animal:</h2>
                <ul class="text-list f100">
                    <?php
                    $result = getSpiciesName($pInfo['id_spicies']);
                    if($result != false)echo '<li><b>Espèce:</b> ' .$result['spicies']. '</li>';
                    else echo '<li><b>Espèce:</b> / </li>';
                    $result = getRaceName($pInfo['id_race']);
                    if($result != false)echo '<li><b>Race:</b> ' .$result['race']. '</li>';
                    else echo '<li><b>Race:</b> / </li>';
                    if($pInfo['male'] == 1)echo '<li><b>Sexe:</b> Mâle</li>';
                    else echo '<li><b>Sexe:</b> Femelle</li>';
                    echo '<li><b>Couleurs(s):</b> ' .$pInfo['color']. '</li>';
                    if($pInfo['waist'] != "")echo '<li><b>Taille:</b> '.$pInfo['waist'].'</li>';
                    else echo '<li><b>Taille:</b> /</li>';
                    if($pInfo['age'] != 0)echo '<li><b>Age approximatif:</b> '.$pInfo['age'].'</li>';
                    else echo '<li><b>Age approximatif:</b> /</li>';
                    if($pInfo['puce'] != 0)echo '<li><b>Puce:</b> '.$pInfo['puce'].'</li>';
                    else echo '<li><b>Puce:</b> /</li>';
                    if($pInfo['physic'] != "")echo '<li><b>Particularités physiques:</b> '.$pInfo['physic'].'</li>';
                    else echo '<li><b>Particularités physiques:</b> /</li>';
                    if($pInfo['behaviour'] != "")echo '<li><b>Comportement observé:</b> '.$pInfo['behaviour'].'</li>';
                    else echo '<li><b>Comportement observé:</b> /</li>';
                    if($pInfo['age'] != 0)echo '<li><b>Âge approximatif:</b> '.$pInfo['age'].'</li>';
                    else echo '<li><b>Âge approximatif:</b> /</li>';
                    ?>
                </ul>
                <h2>Informations sur le dernier signalement:</h2>
                <ul class="text-list f100">
                    <?php
                    echo '<li><b>Adresse ou zone approximative:</b> '. $pInfo['adress'] . '</li>';
                    echo '<li><b>Date de la disparition: </b> '. $pInfo['_date'] . '</li>';
                    echo '<li><b>Heure de la disparition:</b> '. $pInfo['_time'] . '</li>';
                    ?>
                </ul>
                <h2>Profil du propriétaire:</h2>
                <div class="info-profil f100">
                    <?php
                    if($uInfo != false){
                        echo '<img src="assets/img/profil/'.$uInfo['img_profil'].'" alt="Photo du profil" id="little-profil-pic">';
                        echo '<a href="?p=vcompte&id='.$pInfo['id_user'].'" id="profil-link">'.$uInfo['pseudo'].'</a>';
                    }
                    ?>
                </div>
            </div>

            <?php 
            if(userConnected() == true){
                require_once 'controllers/controller_msg.php'; // Appel du controller pour les messages
            }
            ?>
        </section>
    </main>
    <?php require_once 'templates/footer.php'; // Affichage du footer  ?>
</body>
</html>
