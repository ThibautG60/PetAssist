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
    <title>Pet Assist' - Foire au questions</title>

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
            <h1 class="articletitle">FAQ – Questions Fréquentes</h1>
            <div class="line"></div>
                <ol>
                <li><b>Comment signaler un animal disparu sur Pet Assist' ?</b></li>
                <p>Pour signaler un animal disparu, il vous suffit de vous inscrire sur le site et de créer une
                    annonce. Vous devrez fournir des informations détaillées : une description de l'animal, sa photo, le
                    dernier endroit où il a été vu, les personnes qui ont des informations peuvent vous contacter via
                    une messagerie interne.</p>
                <li><b>Est-ce que le service est gratuit ?</b></li>
                <p>Oui, l'ensemble du service de signalement est entièrement gratuit, sans frais cachés. Nous croyons
                    que la solidarité et l'entraide ne doivent pas avoir de prix, surtout lorsqu'il s'agit de retrouver
                    un compagnon perdu.</p>
                <li><b>Comment savoir si mon animal a été retrouvé ?</b></li>
                <p>Lorsque vous vous inscrivez sur le site, vous pouvez recevoir des alertes par e-mail ou
                    notifications (si vous avez activé cette option) chaque fois qu'un animal correspondant à votre
                    signalement est retrouvé. Vous pouvez aussi consulter régulièrement les annonces sur la plateforme
                    pour voir si quelqu'un a trouvé un animal similaire au vôtre.</p>
                <li><b>Puis-je modifier mon signalement si j'ai plus d'informations ?</b></li>
                <p>Oui, vous pouvez à tout moment revenir sur votre signalement pour y ajouter de nouvelles
                    informations ou modifier les détails de l'animal. Vous aurez un accès à votre compte pour gérer vos
                    annonces à tout moment.</p>
                <li><b>Comment signaler un animal retrouvé ?</b></li>
                <p>Si vous avez trouvé un animal que vous souhaitez signaler, vous pouvez créer une annonce dans la
                    section "J'ai trouvé un animal". Donnez une description précise de l'animal, idéalement accompagnée
                    d'une photo. Nous vous encourageons à inclure l'endroit où l'animal a été trouvé pour aider les
                    propriétaires à localiser leur compagnon.</p>
                <li><b>Que faire si quelqu'un pense avoir trouvé mon animal ?</b></li>
                <p>Si quelqu'un vous contacte pour vous signaler avoir trouvé votre animal, nous vous recommandons de
                    vérifier les détails pour confirmer qu'il s'agit bien de votre compagnon. Nous vous encourageons à
                    procéder avec prudence : assurez-vous de poser des questions spécifiques à la personne qui a trouvé
                    l'animal (par exemple, la couleur des yeux, une particularité de l'animal) pour vérifier qu'il
                    s'agit bien du vôtre avant de vous rencontrer.</p>
                <li><b>Mon animal a disparu depuis plusieurs jours, est-ce trop tard pour signaler sa disparition ?</b>
                </li>
                <p>Non, il n'est jamais trop tard pour signaler un animal disparu ! Même si plusieurs jours se sont
                    écoulés, il y a toujours une chance que quelqu'un ait vu ou trouvé votre compagnon. Chaque
                    signalement est utile et peut aider à élargir les recherches.</p>
                <li><b>Est-ce que je peux signaler un animal qui n'est pas à moi ?</b></li>
                <p>Oui, vous pouvez signaler un animal que vous avez trouvé ou aperçu, même s'il ne vous appartient
                    pas. Notre communauté de recherche est basée sur l’entraide, et chaque signalement peut être crucial
                    pour retrouver un animal perdu.</p>
                <li><b>Que faire si je reçois une alerte pour un animal qui ressemble au mien ?</b></li>
                <p>Si vous recevez une alerte pour un animal qui ressemble à votre compagnon, nous vous recommandons de
                    contacter immédiatement la personne qui a posté l’annonce via la messagerie que propose notre site
                    pour vérifier si c’est effectivement votre
                    animal. Assurez-vous de poser des questions pour confirmer l’identité de l’animal (par exemple, sa
                    taille, sa race, son comportement).</p>
                <li><b>Que faire si je suis sûr que l’animal trouvé ou retrouvé est le mien ?</b></li>
                <p>Si vous êtes sûr que l'animal retrouvé ou signalé correspond à votre compagnon, contactez
                    immédiatement la personne qui a posté l'annonce. Nous vous conseillons de vous organiser pour
                    vérifier l'identité de l'animal (rencontrer la personne en question, demander des preuves ou des
                    détails spécifiques sur l'animal, etc.) avant de procéder à la récupération.</p>
                <li><b>Pourquoi devrais-je partager une photo de mon animal ?</b></li>
                <p>Une photo est un moyen très efficace d’identifier un animal et d’aider les autres à le reconnaître.
                    Plus la description et les images fournies sont précises, plus il est facile pour les autres membres
                    de la communauté de repérer votre compagnon et de vous aider.</p>
                <li><b>Y a-t-il un moyen d'améliorer la visibilité de mon signalement ?</b></li>
                <p>Oui, vous pouvez partager votre annonce sur les réseaux sociaux ou demander à des amis de le faire
                    pour vous. Plus votre signalement est partagé, plus il y a de chances que quelqu'un voit votre
                    annonce et puisse vous aider.</p>
            </ol>
        </article>
        <img class="tabmediacut" src="assets/img/right_faq.jpeg" alt="Image de droite" id="imgright">
    </section>
    </main>
    <?php require_once 'templates/footer.php'; // Affichage du footer  ?>
</body>
</html>