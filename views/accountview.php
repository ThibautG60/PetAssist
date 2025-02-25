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
    <?php echo '<title>Pet Assist \' - Compte de '.$uInfo['pseudo'].'</title>'; ?> 
    

    <!-- Importation des fichiers CSS -->
    <link rel="stylesheet" href="assets/css/stylebase.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/accountstyle.css">
    <link rel="stylesheet" href="assets/css/adminstyle.css">
    <link rel="stylesheet" href="assets/css/list.css">
    <link rel="stylesheet" href="assets/css/msg.css">

    <!-- Importation des fichiers JS -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script defer src="assets/js/animations.js"></script> 
    <script defer src="assets/js/msg.js"></script>
    <script defer src="assets/js/admin.js"></script>
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
                <div class="f100 only-tabphone icon-admin-box">
                    <?php 
                    echo '<h1 class="articletitle">'.$uInfo['pseudo'].'</h1>';
                    /* Bouttons admin */
                    if(userConnected() == true && getAdminLvl($_SESSION["id_user"])['admin_type'] != 0){ // On vérifie que l'user soit connecté & qu'il soit modérateur
                        echo '<a href="?p=vcompte&id='.$uInfo['id_user'].'&m='.$uInfo['id_user'].'" id="modify'.$uInfo['id_user'].'" class="btn-admin modify"><img src="./assets/img/icons/modify.png" class="icon-admin" alt="Icone administrateur"></a>';
                        echo '<a href="?p=vcompte&id='.$uInfo['id_user'].'&d='.$uInfo['id_user'].'" id="delete'.$uInfo['id_user'].'" class="btn-admin delete"><img src="./assets/img/icons/delete.png" class="icon-admin" alt="Icone administrateur"></a>';
                    }
                    ?>
                </div>
                <div class="linec"></div>
                <?php echo '<div class="description f100">Voici tous les signalements de '.$uInfo['pseudo'].'. Vous pouvez retrouver tout ses avis de recherche, ses signalements et vous pouvez également la contacter.</div>' ?>

            </div>
            <div class="info-profil-img">
                <?php echo '<img src="assets/img/profil/'.$uInfo['img_profil'].'" alt="Photo de profil" id="profil-pic">'; 
                if(userConnected() == true){
                    echo '<button class="btn btn-primary msg-button">Envoyer un message</button>';
                }
                ?>
            </div>
            <div class="body-info-box">
                <?php echo '<h2 class="articletitle only-tabphone f100">Les signalements de '.$uInfo['pseudo'].'</h2>'; ?>
                <div class="linec only-tabphone"></div>
                <div class="list">
                <?php
                    //- Génération de la liste
                    $petInfo = getUserPetInfo($uInfo['id_user']);
                    if($petInfo != false){     
                        foreach($petInfo as $pet){
                            if($pet['lost'] != 1)echo '<div class="card-pet box-found">';
                            else echo '<div class="card-pet box-lost">';
                            echo '<a href="?p=pet_profil&id='.$pet['id_pet'].'" title="Voir le signalement en détail"><img src="assets/img/pet/' . $pet['img_pet'] . '" alt="Photo de l\'animal" class="img-pet"></a>';
                            echo '<div class="card-body">';
                                if($pet['pet_name'] != "")echo '<p class="card-title">' . $pet['pet_name'] . '</p>';
                                else echo '<p class="card-title">' . getRaceName($pet['id_race'])['race'] . '</p>';

                                if($pet['lost'] != 1)echo '<div class="line-found"></div>';
                                else echo '<div class="line-lost"></div>';
                                
                                echo '<p class="card-text">Espèce: ' . getSpiciesName($pet['id_spicies'])['spicies'] . '<br>Race: ' .getRaceName($pet['id_race'])['race']. '<br>Lieu: ' .$pet['adress']. '<br>Date: ' .$pet['_date']. '</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    else{
                        echo '<p class="description">Aucun signalement trouvé</p>';
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
