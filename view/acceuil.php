<head>
    <title>Pet Assist' - Retrouvons vos animaux !</title>
</head>

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
        if (isset($jsonData)) {
            global $jsonData; // Variable des données
            $i = 0;

            foreach($jsonData['petlist'] as $pet){
                if($i == 0){
                    echo '<div class="carousel-item active">';
                }
                else {
                    echo '<div class="carousel-item">';
                }
                    echo '<img src="assets/img/pet/' . $pet['petImg']. '" class="d-block w-100" alt="Image animal">';
                    echo '<div class="carousel-caption">';
                    echo '<h5>Nom: ' .$pet['petName']. '</h5>';
                    echo '<p>Espèce: ' .$pet['petSpicies']. '<br>Race: ' .$pet['petRace']. '<br>Sexe: ' .$pet['petSex']. '<br>Date: ' .$pet['petDate']. '<br>Lieu: ' .$pet['petAdress']. '</p>';
                    echo '</div>';
                    echo '</div>';
                    $i++;
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