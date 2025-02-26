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
    <title>Pet Assist' - Mon compte</title>

    <!-- Importation des fichiers CSS -->
    <link rel="stylesheet" href="assets/css/stylebase.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/accountstyle.css">
    <link rel="stylesheet" href="assets/css/msg.css">

    <!-- Importation des fichiers JS pour bootstrap & animations -->
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
        <section class="articlefixe">
            <h1 class="articletitle" id="accounttitle">Bienvenue dans votre espace personnel</h1>
            <p>Sur la page de gestion de votre compte, vous pourrez facilement gérer vos informations et suivre
                l'évolution de vos annonces. Voici ce que vous pourrez faire :</p>
            <ul>
                <li><b>Modifier votre compte : </b> Mettez à jour vos informations personnelles, comme votre nom,
                    adresse e-mail ou mot de passe.</li>
                <li><b>Consulter vos notifications :</b> Vous trouverez ici toutes les alertes concernant vos annonces,
                    telles que les nouvelles mises à jour ou les réponses d'autres utilisateurs.</li>
                <li><b>Lire vos messages : </b>Accédez à un espace dédié pour échanger avec les autres membres du site,
                    répondre à des questions ou discuter des animaux perdus ou retrouvés.</li>
                <li><b>Gérer vos annonces :</b> Consultez, modifiez ou supprimez vos annonces concernant les animaux
                    perdus ou retrouvés.</li>
            </ul>
            <p>Cette page vous offre un moyen simple et rapide de suivre toutes vos activités et de rester informé sur
                vos signalements.</p>
            <div class="accountarea">
                <div class="accountcat">
                    <h2>Mes publications</h2>
                    <div class="line"></div>
                    <div class="accordion accordion-flush" id="accordionPublish">
                    <?php
                        //- Génération de la liste
                        $uInfo = getUserInfo($_SESSION['id_user']);
                        $petInfo = getUserPetInfo($uInfo['id_user']);
                        if($petInfo != false){  
                            $i = 0;   
                            foreach($petInfo as $pet){
                                echo '<div class="accordion-item">';
                                echo '<h3 class="accordion-header">';
                                if($pet['resolved'] == 1){
                                    if($pet['pet_name'] != "") echo '<button class="accordion-button collapsed bg-success text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">Je cherche: '.$pet['pet_name'].' [RETROUVE]</button>';
                                    else echo '<button class="accordion-button collapsed bg-success text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">Je cherche: '.getRaceName($pet['id_race'])['race'].' [RETROUVE]</button>';
                                }
                                else if($pet['lost'] == 1){
                                    if($pet['pet_name'] != "") echo '<button class="accordion-button collapsed bg-danger text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">Je cherche: '.$pet['pet_name'].'</button>';
                                    else echo '<button class="accordion-button collapsed bg-danger text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">Je cherche: '.getRaceName($pet['id_race'])['race'].'</button>';
                                }
                                else{
                                    echo '<button class="accordion-button collapsed bg-info text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">Je cherche: '.getRaceName($pet['id_race'])['race'].'</button>';
                                }
                                echo '</h3>';
                                echo '<div id="collapse'.$i.'" class="accordion-collapse collapse" data-bs-parent="#accordion-flush">';
                                    echo '<div class="accordion-body">';
                                        echo '<img class="account_accordion_img" src="assets/img/pet/' . $pet['img_pet'] . '" alt="image de l\'animal">';
                                        echo '<p>Espèce: ' . getSpiciesName($pet['id_spicies'])['spicies'] . '<br>Race: ' .getRaceName($pet['id_race'])['race']. '<br>Lieu: ' .$pet['adress']. '<br>Date: ' .$pet['_date']. '</p>';
                                        echo '<a href="?p=pet_profil&id=' .$pet['id_pet']. '">Voir en détail</a>';
                                    echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                $i++;
                            }
                        }
                        else{
                            echo '<p>Aucun résultat</p>';
                        }
                    ?>
                    </div>
                </div>
                <div class="accountcat" id="bordercenter">
                    <h2>Mes notifications</h2>
                    <div class="line"></div>
                    <div class="halert">
                        <?php
                        //- Génération de la liste des notifications
                        $userNotifs = getUserNotifs($_SESSION['id_user']);
                        if($userNotifs != false){  
                            foreach($userNotifs as $notif){
                                if($notif['notif_type'] == 1){
                                    echo '<div class="alert alert-info" role="alert">' .$notif['date_time'].': '.$notif['notif_text'].'</div>';
                                }
                                else{
                                    echo '<div class="alert alert-success" role="alert">' .$notif['date_time'].': '.$notif['notif_text'].'</div>';
                                }
                            }
                        }
                        else{
                            echo '<p>Aucun résultat</p>';
                        }
                        ?>
                    </div>
                </div>
                <div class="accountcat">
                    <h2>Mes messages</h2>
                    <div class="line"></div>

                    <?php require_once 'controllers/controller_msg.php'; // Appel du controller pour les messages ?>
                    
                </div>
            </div>
            <div class="articletitle">
                <p>Vous pouvez modifier votre compte ou vous déconnecter à tout moment en cliquant sur le bouton
                    ci-dessous:</p>
                <div id="box-button">
                    <form>
                        <a href="?p=mcompte" class="btn btn-primary ml-5 mb-2" id="modify">Modifier mon compte</a>
                    </form>
                    <form method="POST">
                        <input type="submit" class="btn ml-5 mb-2" id="deconnect" name="deconnect" value="Se déconnecter" />
                    </form>
                </div>
            </div>
        </section>
        </main>
    <?php require_once 'templates/footer.php'; // Affichage du footer  ?>
</body>
</html>