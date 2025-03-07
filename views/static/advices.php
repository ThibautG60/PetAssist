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
    <title>Pet Assist' - Nos conseils</title>

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
            <h1 class="articletitle">Nos conseils pour vous aider dans vos recherches</h1>
            <div class="line"></div>
            <p class="description">Retrouver un animal perdu peut être une expérience stressante, mais voici
                quelques conseils pratiques
                pour augmenter vos chances de le retrouver rapidement et en toute sécurité :</p>
            <ol>
                <li class="listcat">Agir rapidement</li>
                <p><b>Ne perdez pas de temps :</b> Plus vous commencez tôt, plus vous avez de chances de
                    retrouver votre animal. Dès que vous vous apercevez qu'il est perdu, commencez à le chercher
                    immédiatement.</p>
                <li class="listcat">Rechercher dans les environs</li>
                <ul>
                    <li><b>Vérifiez votre quartier :</b> Commencez par faire le tour de votre quartier, en appelant
                        son nom, en l’appelant d’une voix calme. Parfois, les animaux se cachent à proximité.</li>
                    <li><b>Vérifiez les endroits où il se cache habituellement :</b> Regardez sous les buissons,
                        dans les garages ouverts, sous les voitures, et dans d'autres lieux où il pourrait se sentir
                        en sécurité.</li>
                    <li><b>Parlez aux voisins :</b> Demandez à vos voisins s'ils ont vu votre animal. Parfois, les
                        animaux sont trouvés et gardés temporairement avant que les propriétaires ne soient
                        informés.</li>
                </ul>
                <li class="listcat">Alertez les autorités et les associations</li>
                <ul>
                    <li><b>Contactez les refuges et les vétérinaires locaux :</b> Appelez les refuges, cliniques
                        vétérinaires et associations de protection des animaux pour signaler que votre animal est
                        perdu. Laissez-leur une description détaillée (couleur, taille, comportement, etc.) et vos
                        coordonnées.</li>
                    <li><b>Signalez à la fourrière :</b> En fonction de votre pays, certains animaux errants peuvent
                        être recueillis par la fourrière, donc il est important de leur signaler la perte
                        rapidement.</li>
                    <li><b>Utilisez les plateformes en ligne :</b>Inscrivez-vous sur des sites ou applications
                        spécialisés dans les animaux perdus (comme Pet Assist'), ou sur des groupes Facebook locaux
                        dédiés aux animaux disparus.</li>
                </ul>
                <li class="listcat">Distribuer des affiches</li>
                <ul>
                    <li><b>Créez des affiches claires et visibles :</b> Rédigez des affiches avec une photo récente
                        de votre animal, une description détaillée, votre numéro de téléphone et, si possible, une
                        récompense. Affichez-les dans des lieux fréquentés (supermarchés, parcs, panneaux
                        d'affichage communautaires) et demandez à vos voisins de vous aider.</li>
                    <li><b>Diffuser en ligne :</b> Partagez des informations sur les réseaux sociaux, notamment dans
                        les groupes locaux. Utilisez des plateformes comme Instagram, Facebook, et Twitter pour
                        alerter un plus grand nombre de personnes.</li>
                </ul>
                <li class="listcat">Parler à la communauté</li>
                <ul>
                    <li><b>Demandez à la communauté locale :</b> Parlez à vos voisins, postez sur des groupes
                        communautaires (réseaux sociaux locaux, forums, etc.). Plus de gens seront à l’affût de
                        votre animal, ce qui augmente les chances de le retrouver.</li>
                    <li><b>Vérifiez les caméras de sécurité locales :</b> Si vous vivez dans une zone avec des
                        caméras de sécurité publiques ou privées, demandez si elles ont capturé des images de votre
                        animal.</li>
                </ul>
                <li class="listcat">Utiliser des méthodes de recherche supplémentaires</li>
                <ul>
                    <li><b>Laisser des objets familiers à l'extérieur :</b> Laissez un de ses objets familiers
                        (comme son panier, une couverture ou un jouet) dehors. L’odeur peut attirer votre animal si
                        celui-ci est dans les environs.</li>
                    <li><b>Essayez la nourriture ou l'odeur de votre propre parfum :</b> Si votre animal est
                        craintif, l'odeur familière de sa nourriture ou de vos affaires (vêtements, une vieille
                        paire de chaussures) peut l'attirer.</li>
                    <li><b>La recherche nocturne :</b> Les animaux perdus sont souvent plus actifs la nuit, alors
                        essayez de faire une recherche dans votre quartier à la tombée de la nuit ou à l’aube,
                        lorsque c'est plus calme.</li>
                </ul>
                <li class="listcat">Utiliser la technologie pour vous aider</li>
                <ul>
                    <li><b>Surveillez les alertes de microchip :</b> Si votre animal porte une puce électronique,
                        contactez l’organisation qui gère la base de données des puces pour signaler la perte.
                        Assurez-vous que vos informations de contact sont à jour.</li>
                    <li><b>Suivi GPS </b> Si votre animal a un collier avec un dispositif GPS, utilisez
                        l’application associée pour localiser son dernier emplacement connu.</li>
                    <li><b>Appel avec des sons familiers :</b> Enregistrez-vous en train d'appeler votre animal ou
                        en émettant des sons qu’il reconnaît (bruit de la porte d’entrée, son de ses croquettes,
                        etc.), et écoutez si vous entendez une réaction.</li>
                </ul>
                <li class="listcat">Maintenir l'espoir et la patience</li>
                <ul>
                    <li><b>Soyez patient :</b>Ne perdez pas espoir, surtout si la recherche prend du temps. Parfois,
                        les animaux peuvent se cacher pendant plusieurs jours avant de revenir à un endroit
                        familier.</li>
                    <li><b>Ne baissez pas les bras :</b> Continuez de diffuser les informations, de suivre les
                        pistes et de contacter les refuges même si vous ne trouvez pas votre animal immédiatement.
                    </li>
                </ul>
                <li class="listcat">Prévention à l'avenir</li>
                <ul>
                    <li><b>Assurez-vous que votre animal porte toujours une identification :</b> Un collier avec une
                        médaille et un microchip avec vos coordonnées sont des moyens efficaces de retrouver votre
                        animal en cas de perte.</li>
                    <li><b>Envisagez un suivi GPS :</b> Pour les animaux qui s’aventurent souvent dehors, un collier
                        GPS peut être un moyen de savoir où ils se trouvent en temps réel.</li>
                </ul>
            </ol>
            <p class="description">Ces étapes combinées augmenteront vos chances de retrouver votre animal
                rapidement. Restez
                persévérant et demandez l’aide de la communauté locale, car souvent, les voisins ou d'autres
                personnes peuvent avoir vu votre compagnon et vous aider dans la recherche.
            </p>
        </article>
        <img class="tabmediacut" id="imgright" src="assets/img/right_advice.jpeg" alt="Image de droite">
        </section>
        </main>
    <?php require_once 'templates/footer.php'; // Affichage du footer  ?>
</body>
</html>