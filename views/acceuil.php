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
    <title>Pet Assist' - Retrouvons vos animaux !</title>

    <!-- Importation des fichiers CSS -->
    <link rel="stylesheet" href="assets/css/stylebase.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

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
        <section class="presentation">
            <article class="article">
                <h1 class="articletitle">Bienvenue sur Pet Assist' </h1>
                <h2 class="articletitle">Votre allié pour retrouver votre compagnon disparu !</h2>
                <div class="line"></div>
                <p class="description">La disparition d'un animal de compagnie est une épreuve bouleversante. À travers
                    Pet Assist', nous
                    souhaitons vous apporter un soutien précieux dans ces moments difficiles. Notre plateforme de
                    signalement a été conçue pour faciliter la recherche et mettre en relation les propriétaires
                    d'animaux disparus avec les personnes susceptibles de les avoir aperçus.</p>
                <h3>Comment ça fonctionne ?</h3>
                <ol>
                    <li><b>Signalez la disparition de votre animal :</b> Créez une annonce détaillée en quelques clics
                        en précisant les informations essentielles sur votre compagnon (photo, description, dernier
                        endroit vu, etc.).</li>
                    <li><b>Consultez les signalements :</b> Parcourez les annonces d'animaux retrouvés ou disparus dans
                        votre région. Peut-être que quelqu'un a trouvé votre animal ou l'a vu récemment !</li>
                    <li><b>Recevez des alertes :</b> En vous inscrivant sur le site, vous recevrez des notifications en
                        cas de signalement correspondant à votre recherche, pour ne jamais manquer une opportunité.</li>
                    <li><b>Communauté solidaire :</b> Notre plateforme permet aux internautes de signaler tout aperçu ou
                        découverte d'animal perdu, ce qui renforce l'efficacité des recherches grâce à l'implication de
                        chacun.</li>
                </ol>
                <h3>Pourquoi choisir Pet Assist' ?</h3>
                <ul>
                    <li><b>Simplicité d’utilisation :</b> Créez rapidement un signalement en quelques étapes simples et
                        faciles.</li>
                    <li><b>Réactivité :</b> Recevez des alertes en temps réel pour être informé immédiatement de toute
                        nouvelle information concernant votre animal..</li>
                    <li><b>Communauté engagée :</b> Rejoignez un réseau d’autres propriétaires et passionnés d’animaux
                        pour maximiser vos chances de retrouver votre compagnon.</li>
                    <li><b>Gratuit et sans publicité :</b> Notre service est entièrement gratuit, sans publicité
                        intrusive, pour vous offrir une expérience claire et efficace.</li>
                </ul>
                <p>Les minutes comptent quand un animal disparaît. En rejoignant la communauté Pet Assist, vous donnez à votre
                    compagnon la meilleure chance de retrouver son chemin à la maison.</p>
            </article>

            <div id="carouselIndex" class="carousel slide gridcard mb-2">
                <div class="carousel-inner">
                <?php
                //- Génération de la liste pour le carousselle
                $pInfo = getAllPetInfo();
                if ($pInfo != false) {
                    $i = 0;

                    foreach($pInfo as $pet){
                        if($pet['resolved'] == 0){
                            if($i > 5)break;
                            if($i == 0){
                                echo '<div class="carousel-item active">';
                            }
                            else {
                                echo '<div class="carousel-item">';
                            }
                            echo '<img src="assets/img/pet/' . $pet['img_pet']. '" class="d-block" alt="Image animal">';
                            echo '<div class="carousel-caption">';
                            if($pet['pet_name'] != "")echo '<h5>Nom: ' .$pet['pet_name']. '</h5>';
                            else {
                                if($pet['lost'] == 1)echo '<h5>Animal perdu</h5>';
                                else echo '<h5>Animal trouvé</h5>';
                            }
                            if($pet['male'] == 1)echo '<p>Espèce: ' .getSpiciesName($pet['id_spicies'])['spicies']. '<br>Race: ' .getRaceName($pet['id_race'])['race']. '<br>Sexe: Mâle<br>Date: ' .$pet['_date']. '<br>Lieu: ' .$pet['adress']. '</p>';
                            else echo '<p>Espèce: ' .getSpiciesName($pet['id_spicies'])['spicies']. '<br>Race: ' .getRaceName($pet['id_race'])['race']. '<br>Sexe: Femelle<br>Date: ' .$pet['_date']. '<br>Lieu: ' .$pet['adress']. '</p>';
                            echo '</div>';
                            echo '</div>';
                            $i++;
                        }
                    }     
                }    
                ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndex"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselIndex"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </main>
    <?php require_once 'templates/footer.php'; // Affichage du footer  ?>
</body>
</html>